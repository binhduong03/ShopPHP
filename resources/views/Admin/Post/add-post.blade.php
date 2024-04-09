@extends('index')

@section('index-content')
<div class="container-xxl flex-grow-1 container-p-y">
  <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Thêm Bài Viết Mới</span></h4>

  <div class="card mb-4">
    <div class="card-header d-flex align-items-center justify-content-between">
      <h5 class="mb-0">Thêm Bài Viết Mới</h5>
    </div>
    <div class="card-body">
      <form method="POST" action="{{ URL::to('add-post') }}">
        <div class="row mb-3">
          <div class="col-sm-12">
            <label for="post-name" class="form-label">Tên</label>
            <div class="input-group">
              <span class="input-group-text bg-white text-muted"><i class="fas fa-heading"></i></span>
              <input type="text" class="form-control" id="post-name" placeholder="Nhập tên bài viết" />
            </div>
          </div>
        </div>
        <div class="row mb-3">
          <div class="col-sm-12">
            <label for="post-description" class="form-label">Mô Tả</label>
            <div class="input-group">
              <span class="input-group-text bg-white text-muted"><i class="fas fa-file-alt"></i></span>
              <textarea class="form-control" id="post-description" placeholder="Nhập mô tả bài viết"></textarea>
            </div>
          </div>
        </div>
        <div class="row mb-3">
          <div class="col-sm-12">
            <label for="post-details" class="form-label">Chi Tiết</label>
            <div class="input-group">
              <span class="input-group-text bg-white text-muted"><i class="fas fa-info-circle"></i></span>
              <textarea class="form-control" id="post-details" placeholder="Nhập chi tiết bài viết"></textarea>
            </div>
          </div>
        </div>
        <div class="row mb-3">
          <div class="col-sm-12">
            <label for="post-image" class="form-label">Hình Ảnh</label>
            <div class="input-group">
              <span class="input-group-text bg-white text-muted"><i class="fas fa-image"></i></span>
              <input type="file" class="form-control" id="post-image" />
            </div>
          </div>
        </div>
        <div class="row mb-3">
          <div class="col-sm-12">
            <label for="post-isactive" class="form-label">Kích Hoạt</label>
            <div class="form-check">
              <input type="checkbox" class="form-check-input" id="post-isactive" />
              <label class="form-check-label" for="post-isactive">Kích Hoạt</label>
            </div>
          </div>
        </div>
        <div class="row justify-content-end">
          <div class="col-sm-12">
            <button type="submit" class="btn btn-primary"><i class="fas fa-plus"></i> Thêm Bài Viết</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

@endsection
