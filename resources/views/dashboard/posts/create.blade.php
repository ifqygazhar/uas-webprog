@extends('dashboard.layout.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Create New Posts</h1>
</div>

<div class="col-lg-8">
    <form action="/dashboard/allposts" method="post" class="mb-5" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" required autofocus value="{{old('title')}}">
            @error('title')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="slug" class="form-label">Slug</label>
            <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" required value="{{old('slug')}}">
            @error('slug')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="sizes" class="form-label">Sizes</label>
            <div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input @error('sizes') is-invalid @enderror" id="sizeXXL" name="sizes[]" value="XXL">
                    <label class="form-check-label" for="sizeXXL">XXL</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input @error('sizes') is-invalid @enderror" id="sizeXL" name="sizes[]" value="XL">
                    <label class="form-check-label" for="sizeXL">XL</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input @error('sizes') is-invalid @enderror" id="sizeL" name="sizes[]" value="L">
                    <label class="form-check-label" for="sizeL">L</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input @error('sizes') is-invalid @enderror" id="sizeM" name="sizes[]" value="M">
                    <label class="form-check-label" for="sizeM">M</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input @error('sizes') is-invalid @enderror" id="sizeS" name="sizes[]" value="S">
                    <label class="form-check-label" for="sizeS">S</label>
                </div>
            </div>
            @error('sizes')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
            <small class="form-text text-muted">Pilih lebih dari satu ukuran jika diperlukan.</small>
        </div>

        <div class="mb-3">
            <label for="harga" class="form-label">Harga</label>
            <div class="input-group">
                <span class="input-group-text">Rp</span>
                <input type="text" class="form-control @error('harga') is-invalid @enderror" id="harga" name="harga" required autofocus value="{{ old('harga') }}" oninput="formatRupiah(this)">
            </div>
            @error('harga')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>


        <div class="mb-3">
            <label for="image" class="form-label">Post Image</label>
            <img class="img-fluide img-preview mb-3 col-sm-5">
            <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage()">
            @error('image')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="body" class="form-label">Description Post</label>
            @error('body')
            <p class="text-danger">{{$message}}</p>
            @enderror
            <input id="body" type="hidden" name="body" required value="{{old('body')}}">
            <trix-editor input="body"></trix-editor>
        </div>

        <button type="submit" class="btn btn-primary">Create Post</button>
    </form>
</div>

<script>
    const title = document.querySelector('#title');
    const slug = document.querySelector('#slug');

    title.addEventListener('change', function() {
        fetch('/dashboard/allposts/checkSlug?title=' + title.value)
            .then(response => response.json())
            .then(data => slug.value = data.slug)
    });

    document.addEventListener('trix-file-accept', function(e) {
        e.preventDefault();
    });

    function previewImage() {
        const image = document.querySelector('#image');
        const imgPreview = document.querySelector('.img-preview');

        imgPreview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload = function(oFREvent) {
            imgPreview.src = oFREvent.target.result;
        }
    }
</script>

<script>
    function formatRupiah(input) {
        let value = input.value.replace(/[^0-9]/g, ''); // Hapus semua karakter non-digit
        let formatted = new Intl.NumberFormat('id-ID', {
            style: 'decimal',
            maximumFractionDigits: 0,
        }).format(value);
        input.value = formatted;
    }
</script>


@endsection