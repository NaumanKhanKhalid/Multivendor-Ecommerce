<table id="" class="table dataTable no-footer" aria-describedby="responsive-data-table_info">
    <thead>
        <tr>
            <th>Name</th>
            <th>Type</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($products as $product)
            <tr>
                <td>{{ $product->name }}</td>
                <td class="sorting_1">
                    @if ($product->primaryImage)
                        <img class="tbl-thumb" src="{{ $product->primaryImage->file_path }}" alt="Product Image">
                    @else
                        <img class="tbl-thumb" src="{{ asset('images/no-image.png') }}" alt="No Image"> {{-- fallback --}}
                    @endif
                </td>

            </tr>
        @endforeach
    </tbody>

</table>

<div class="container">

    <div class="row justify-content-between bottom-information" id="Pagination">
        <div class="dataTables_info" role="status" aria-live="polite">
            Showing {{ $products->firstItem() }} to {{ $products->lastItem() }} of {{ $products->total() }} entries
        </div>
        <div class="dataTables_paginate paging_simple_numbers">
            <ul class="pagination" id="paginationLinks">

                <li class="paginate_button page-item {{ $products->onFirstPage() ? 'disabled' : '' }}">
                    <a class="page-link" href="{{ $products->previousPageUrl() ?? 'javascript:void(0);' }}"
                        aria-label="Previous">
                        « Previous
                    </a>
                </li>

                @for ($i = 1; $i <= $products->lastPage(); $i++)
                    <li class="paginate_button page-item {{ $products->currentPage() == $i ? 'active' : '' }}">
                        <a class="page-link" href="{{ $products->url($i) }}">{{ $i }}</a>
                    </li>
                @endfor
                <li
                    class="paginate_button page-item {{ $products->currentPage() == $products->lastPage() ? 'disabled' : '' }}">
                    <a class="page-link" href="{{ $products->nextPageUrl() ?? 'javascript:void(0);' }}"
                        aria-label="Next">
                        Next »
                    </a>
                </li>

            </ul>
        </div>
    </div>
</div>