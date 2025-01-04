<x-layout title="Data Buku">
    <div class="app-content"> <!--begin::Container-->
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
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-header">
                        <h3 class="card-title">Data Buku</h3>
                    </div>
                    <div class="card-body">
                        <a href="{{ route('book.create') }}" class="btn btn-primary">Tambah Data</a>
                        <table class="table table-striped mt-3">
                            <thead>
                                <tr>
                                    <th>
                                        Judul Buku
                                    </th>
                                    <th>
                                        Cover Buku
                                    </th>
                                    <th>
                                        Deskripsi
                                    </th>
                                    <th>
                                        Nama User
                                    </th>
                                    <th>
                                        Aksi
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($books as $item)
                                <tr>
                                    <td>
                                        {{ $item->title }}
                                    </td>
                                    <td>
                                        <img src="{{ Storage::url($item->cover) }}">
                                    </td>
                                    <td>
                                        {{ $item->description }}
                                    </td>
                                    <td>
                                        {{ $item->user->name }}
                                    </td>
                                    <td>
                                        <a href="{{ route('book.edit', $item->id) }}" class="btn btn-warning">Ubah</a>
                                        <a href="{{ route('book.delete', $item->id) }}" class="btn btn-danger">Hapus</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                       {{  $books->links()  }}
                    </div>
                </div> <!-- /.card --> <!-- DIRECT CHAT -->
            </div> <!-- /.Start col --> <!-- Start col -->
        </div>
    </div>
</x-layout>