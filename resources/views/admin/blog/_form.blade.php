<div class="mb-3">
    <label for="blog_category_blog_id" class="form-label-custom">Kategori Blog *</label>
    <select id="blog_category_blog_id" name="blog_category_blog_id" class="form-select" required>
        <option value="">-- Pilih Kategori --</option>
        @foreach ($categories as $category)
            <option value="{{ $category->id }}"
                @selected(old('blog_category_blog_id', $blog->blog_category_blog_id ?? '') == $category->id)>
                {{ $category->name }}
            </option>
        @endforeach
    </select>
    @error('blog_category_blog_id')
        <div class="invalid-feedback d-block">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="name" class="form-label-custom">Judul Blog *</label>
    <input id="name" type="text" name="name" class="form-control" required
        value="{{ old('name', $blog->name ?? '') }}">
    @error('name')
        <div class="invalid-feedback d-block">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="slug" class="form-label-custom">Slug (opsional)</label>
    <input id="slug" type="text" name="slug" class="form-control"
        value="{{ old('slug', $blog->slug ?? '') }}">
    @error('slug')
        <div class="invalid-feedback d-block">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="brief_description" class="form-label-custom">Deskripsi Singkat</label>
    <textarea id="brief_description" name="brief_description" class="form-control" rows="3">{{ old('brief_description', $blog->brief_description ?? '') }}</textarea>
    @error('brief_description')
        <div class="invalid-feedback d-block">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="content" class="form-label-custom">Konten Blog *</label>
    <textarea id="content" name="content" class="form-control" rows="10" required>{{ old('content', $blog->content ?? '') }}</textarea>
    @error('content')
        <div class="invalid-feedback d-block">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="author" class="form-label-custom">Penulis</label>
    <input id="author" type="text" name="author" class="form-control"
        value="{{ old('author', $blog->author ?? 'Team Sticker PPKD') }}">
    @error('author')
        <div class="invalid-feedback d-block">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="cover_path" class="form-label-custom">Cover Blog</label>
    <input id="cover_path" type="file" name="cover_path" class="form-control" accept=".png,.jpg,.jpeg,.gif">
    @if (isset($blog) && $blog->cover_path)
        <img src="{{ asset('storage/' . $blog->cover_path) }}" alt="Cover {{ $blog->name }}" width="160"
            class="mt-2">
    @endif
    @error('cover_path')
        <div class="invalid-feedback d-block">{{ $message }}</div>
    @enderror
</div>
