<x-layout title="Data Buku">
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    <div class="app-content"> <!--begin::Container-->
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-header">
                        <h3 class="card-title">Form Buku</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('book.update', $book->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="form-group">
                                    <label>Judul Buku</label>
                                    <input type="text" name="title" class="form-control" value="{{ $book->title }}">
                                    @if ($errors->has('title'))
                                        <span class="text-danger">{{ $errors->first('title') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Cover</label>
                                    <input type="file" name="cover" class="form-control">
                                    @if ($errors->has('cover'))
                                        <span class="text-danger">{{ $errors->first('cover') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Deskripsi</label>
                                    <textarea name="desc" class="form-control">{{ $book->description }}</textarea>
                                    @if ($errors->has('desc'))
                                        <span class="text-danger">{{ $errors->first('desc') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group pt-3">
                                <button type="submit" class="btn btn-primary">
                                    Simpan
                                </button>
                            </div>
                        </form>
                    </div>
                </div> <!-- /.card --> <!-- DIRECT CHAT -->
            </div> <!-- /.Start col --> <!-- Start col -->
        </div>
    </div>
</x-layout>