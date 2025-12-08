@extends('layouts.admin')
@section('contentCms')
    <div class="page-heading">
        <h3>Profile Statistics</h3>
    </div>
    <div class="page-content">
          <div class="card px-5 py-3">
            <div class="row">
                {{-- <div class="col-12 col-md-4">

                </div> --}}
                <div class="col-12 col-md-12">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td>Nama</td>
                                <td>{{ $discount->name }}</td>
                            </tr>
                            <tr>
                                <td>Persentase</td>
                                <td>{{ $discount->amount }}%</td>
                            </tr>
                            <tr>
                                <td>Tanggan Berlaku</td>
                                <td>{{ $discount->start_date }}</td>
                            </tr>
                            <tr>
                                <td>Tanggan Berakhir</td>
                                <td>{{ $discount->end_date }}</td>
                            </tr>
                        </tbody>
                    </table>
                    <table class="table table-borderless p-0 m-0">
                        <thead>
                            <tr>
                                <th class="ps-0" colspan="2">Produk Diskon:</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($discount->products as $product)
                                <tr>
                                    <td class="ps-0">{{ $loop->iteration }}</td>
                                    {{-- <td>{{ $product->images }}</td> --}}
                                    <td class="ps-0">
                                        {{ $product->name }}
                                    </td>
                                @empty
                                    <td class="ps-0" colspan="2">Belum ada produk.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="d-flex justify-content-start pt-3">
                <a href="/admin/discounts" class="btn btn-success me-2"><i class="bi bi-arrow-left"></i> Kembali</a>
            </div>
        </div>
    </div>
@endsection
