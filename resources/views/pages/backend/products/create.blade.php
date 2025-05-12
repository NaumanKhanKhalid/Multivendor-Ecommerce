@extends('layouts.backend-layout')
@section('title', "Create Product")
@section('content')

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/choices.min.css" />

    <div class="ec-content-wrapper">
        <div class="content">
            <div class="breadcrumb-wrapper d-flex align-items-center justify-content-between">
                <div>
                    <h1>Add Product</h1>
                    <p class="breadcrumbs"><i class="mdi mdi-chevron-right"></i> Product</p>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card card-default">
                        <div class="card-header card-header-border-bottom">
                            <h2>Add Product</h2>
                        </div>
                        <div class="card-body">
                            <div class="row ec-vendor-uploads">
                                <!-- Image Upload Section -->
                                <div class="col-lg-4">
                                    <div class="ec-vendor-img-upload">
                                        <div class="ec-vendor-main-img">
                                            <div class="avatar-upload">
                                                <div class="avatar-edit">
                                                    <input type='file' id="imageUpload" class="ec-image-upload"
                                                        accept=".png, .jpg, .jpeg" />
                                                    <label for="imageUpload"><img
                                                            src="{{ asset('backend/assets/img/icons/edit.svg')}}"
                                                            class="svg_img header_svg" alt="edit" /></label>
                                                </div>
                                                <div class="avatar-preview ec-preview">
                                                    <div class="imagePreview ec-div-preview">
                                                        <img class="ec-image-preview"
                                                            src="{{ asset('backend/assets/img/products/vender-upload-preview.jpg')}}"
                                                            alt="edit" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="thumb-upload-set colo-md-12">
                                                <div class="thumb-upload">
                                                    <div class="thumb-edit">
                                                        <input type='file' id="thumbUpload01" class="ec-image-upload"
                                                            accept=".png, .jpg, .jpeg" />
                                                        <label for="imageUpload"><img
                                                                src="{{ asset('backend/assets/img/icons/edit.svg')}}"
                                                                class="svg_img header_svg" alt="edit" /></label>
                                                    </div>
                                                    <div class="thumb-preview ec-preview">
                                                        <div class="image-thumb-preview">
                                                            <img class="image-thumb-preview ec-image-preview"
                                                                src="{{ asset('backend/assets/img/products/vender-upload-thumb-preview.jpg')}}"
                                                                alt="edit" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="thumb-upload">
                                                    <div class="thumb-edit">
                                                        <input type='file' id="thumbUpload02" class="ec-image-upload"
                                                            accept=".png, .jpg, .jpeg" />
                                                        <label for="imageUpload"><img
                                                                src="{{ asset('backend/assets/img/icons/edit.svg')}}"
                                                                class="svg_img header_svg" alt="edit" /></label>
                                                    </div>
                                                    <div class="thumb-preview ec-preview">
                                                        <div class="image-thumb-preview">
                                                            <img class="image-thumb-preview ec-image-preview"
                                                                src="{{ asset('backend/assets/img/products/vender-upload-thumb-preview.jpg')}}"
                                                                alt="edit" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="thumb-upload">
                                                    <div class="thumb-edit">
                                                        <input type='file' id="thumbUpload03" class="ec-image-upload"
                                                            accept=".png, .jpg, .jpeg" />
                                                        <label for="imageUpload"><img
                                                                src="{{ asset('backend/assets/img/icons/edit.svg')}}"
                                                                class="svg_img header_svg" alt="edit" /></label>
                                                    </div>
                                                    <div class="thumb-preview ec-preview">
                                                        <div class="image-thumb-preview">
                                                            <img class="image-thumb-preview ec-image-preview"
                                                                src="{{ asset('backend/assets/img/products/vender-upload-thumb-preview.jpg')}}"
                                                                alt="edit" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="thumb-upload">
                                                    <div class="thumb-edit">
                                                        <input type='file' id="thumbUpload04" class="ec-image-upload"
                                                            accept=".png, .jpg, .jpeg" />
                                                        <label for="imageUpload"><img
                                                                src="{{ asset('backend/assets/img/icons/edit.svg')}}"
                                                                class="svg_img header_svg" alt="edit" /></label>
                                                    </div>
                                                    <div class="thumb-preview ec-preview">
                                                        <div class="image-thumb-preview">
                                                            <img class="image-thumb-preview ec-image-preview"
                                                                src="{{ asset('backend/assets/img/products/vender-upload-thumb-preview.jpg')}}"
                                                                alt="edit" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="thumb-upload">
                                                    <div class="thumb-edit">
                                                        <input type='file' id="thumbUpload05" class="ec-image-upload"
                                                            accept=".png, .jpg, .jpeg" />
                                                        <label for="imageUpload"><img
                                                                src="{{ asset('backend/assets/img/icons/edit.svg')}}"
                                                                class="svg_img header_svg" alt="edit" /></label>
                                                    </div>
                                                    <div class="thumb-preview ec-preview">
                                                        <div class="image-thumb-preview">
                                                            <img class="image-thumb-preview ec-image-preview"
                                                                src="{{ asset('backend/assets/img/products/vender-upload-thumb-preview.jpg')}}"
                                                                alt="edit" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="thumb-upload">
                                                    <div class="thumb-edit">
                                                        <input type='file' id="thumbUpload06" class="ec-image-upload"
                                                            accept=".png, .jpg, .jpeg" />
                                                        <label for="imageUpload"><img
                                                                src="{{ asset('backend/assets/img/icons/edit.svg')}}"
                                                                class="svg_img header_svg" alt="edit" /></label>
                                                    </div>
                                                    <div class="thumb-preview ec-preview">
                                                        <div class="image-thumb-preview">
                                                            <img class="image-thumb-preview ec-image-preview"
                                                                src="{{ asset('backend/assets/img/products/vender-upload-thumb-preview.jpg')}}"
                                                                alt="edit" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Product Form Section -->
                                <div class="col-lg-8">
                                    <form class="row g-3" method="POST" enctype="multipart/form-data">
                                        @csrf

                                        <div class="col-md-6">
                                            <label class="form-label">Product Name</label>
                                            <input type="text" class="form-control slug-title">
                                        </div>

                                        <div class="col-md-6">
                                            <label class="form-label">Select Categories</label>
                                            <select name="categories" class="form-select">
                                                <optgroup label="Fashion">
                                                    <option value="t-shirt">T-shirt</option>
                                                    <option value="dress">Dress</option>
                                                </optgroup>
                                                <optgroup label="Furniture">
                                                    <option value="table">Table</option>
                                                    <option value="sofa">Sofa</option>
                                                </optgroup>
                                                <optgroup label="Electronic">
                                                    <option value="phone">I Phone</option>
                                                    <option value="laptop">Laptop</option>
                                                </optgroup>
                                            </select>
                                        </div>

                                        <!-- Variation Method -->
                                        <div class="col-md-12">
                                            <label><strong>Variation Method:</strong></label><br>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="variation_method"
                                                    id="auto-variation" value="auto" checked>
                                                <label class="form-check-label" for="auto-variation">Auto from
                                                    Attributes</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="variation_method"
                                                    id="manual-variation" value="manual">
                                                <label class="form-check-label" for="manual-variation">Manual</label>
                                            </div>
                                        </div>

                                        <!-- Attributes -->
                                        <div class="row" id="attribute-selectors">
                                            <h4>Select Attributes:</h4>
                                            @foreach ($attributes as $attribute)
                                                <div class="col-md-4">
                                                    <div class="mb-3">
                                                        <label><strong>{{ $attribute->name }}</strong></label>
                                                        <select multiple class="form-control attribute-select"
                                                            data-placeholder="Select {{ $attribute->name }}"
                                                            data-attribute-id="{{ $attribute->id }}"
                                                            data-attribute-name="{{ $attribute->name }}">
                                                            @foreach ($attribute->values as $value)
                                                                <option value="{{ $value->id }}"
                                                                    data-value-name="{{ $value->value }}">
                                                                    {{ $value->value }}
                                                                </option>
                                                            @endforeach
                                                        </select>

                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>


                                        <!-- Bulk Actions -->
                                        <div class="col-12">
                                            <button type="button" class="btn btn-secondary btn-sm" id="clone-price">Clone
                                                Price</button>
                                            <button type="button" class="btn btn-secondary btn-sm" id="clone-stock">Clone
                                                Stock</button>
                                            <button type="button" class="btn btn-danger btn-sm"
                                                id="delete-all-variations">Delete All</button>
                                            <button type="button" class="btn btn-info btn-sm float-end"
                                                id="add-manual-variation">Add Variation</button>
                                        </div>

                                        <!-- Variations Table -->
                                        <div class="col-12 mt-4">
                                            <h4>Generated Variations:</h4>
                                            <table class="table table-bordered table-striped" id="variations-table">
                                                <thead class="thead-dark">
                                                    <tr>
                                                        <th>Variation</th>
                                                        <th>SKU</th>
                                                        <th>Price ($)</th>
                                                        <th>Stock</th>
                                                        <th>Image</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td colspan="6" class="text-center">Select attributes to generate
                                                            variations</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>

                                        <!-- Submit -->
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-primary mt-3">Save Product</button>
                                        </div>
                                    </form>
                                </div> <!-- End col-lg-8 -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- End Content -->
    </div> <!-- End Wrapper -->


    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function () {
            const selects = $('.attribute-select');
            const tableBody = $('#variations-table tbody');
            const nameInput = $('input[name="name"]');
            const choicesInstances = [];
            let manualVariationIndex = 1000;

            selects.each(function () {
                const choicesInstance = new Choices(this, { removeItemButton: true, shouldSort: false });
                choicesInstances.push(choicesInstance);
                $(this).on('change', updateVariations);
                this.addEventListener('removeItem', function () {
                    setTimeout(() => {
                        $('#variations-table tbody tr').each(function () {
                            if (!$(this).find('input[name$="[combination]"]').val().trim()) $(this).remove();
                        });
                        showEmptyMessageIfNeeded();
                    }, 100);
                });
            });

            nameInput.on('input', updateVariations);

            $('input[name="variation_method"]').on('change', function () {
                const method = $(this).val();

                choicesInstances.forEach(instance => instance.removeActiveItems());
                tableBody.html('<tr><td colspan="6" class="text-center">All variations removed. Select attributes to regenerate.</td></tr>');

                if (method === 'auto') {
                    $('#attribute-selectors').show();
                    $('#add-manual-variation').hide();
                    $('.attribute-select').prop('disabled', false);


                } else {
                    $('#attribute-selectors').hide();
                    $('#add-manual-variation').show();
                    $('.attribute-select').prop('disabled', true);
                    showEmptyMessageIfNeeded();
                }
            });


            function updateVariations() {
                const selected = {};
                selects.each(function () {
                    const attrId = $(this).data('attribute-id');
                    selected[attrId] = [];
                    Array.from(this.selectedOptions).forEach(opt => {
                        selected[attrId].push({ id: opt.value, name: $(opt).data('value-name') });
                    });
                });
                const selectedValues = Object.values(selected).filter(arr => arr.length);
                const combinations = getCombinations(selectedValues);
                tableBody.empty();
                if (!combinations.length) return showEmptyMessageIfNeeded();
                const productName = nameInput.val().trim().replace(/\s+/g, '-').toUpperCase() || 'SKU';
                combinations.forEach((combo, index) => {
                    const label = combo.map(c => c.name).join(' / ');
                    const key = combo.map(c => c.id).join('_');
                    const sku = `${productName}-${key}`;
                    tableBody.append(`
                                                                                                        <tr>
                                                                                                            <td><input type="hidden" name="variations[${index}][combination]" value="${key}">${label}</td>
                                                                                                            <td><input type="text" name="variations[${index}][sku]" class="form-control" value="${sku}"></td>
                                                                                                            <td><input type="number" name="variations[${index}][price]" class="form-control" step="0.01" placeholder="Price"></td>
                                                                                                            <td><input type="number" name="variations[${index}][stock]" class="form-control" placeholder="Stock"></td>
                                                                                                            <td><input type="file" name="variations[${index}][image]" class="form-control-file"></td>
                                                                                                            <td><button type="button" class="btn btn-danger btn-sm remove-variation">Remove</button></td>
                                                                                                        </tr>
                                                                                                    `);
                });
            }

            function getCombinations(arrays, prefix = []) {
                if (!arrays.length) return [prefix];
                const [first, ...rest] = arrays;
                return first.flatMap(value => getCombinations(rest, [...prefix, value]));
            }

            $(document).on('click', '.remove-variation', function () {
                $(this).closest('tr').remove();
                showEmptyMessageIfNeeded();
            });

            $('#clone-price').on('click', function () {
                const prices = $('input[name^="variations"][name$="[price]"]');
                const val = prices.first().val();
                prices.slice(1).val(val);
            });

            $('#clone-stock').on('click', function () {
                const stocks = $('input[name^="variations"][name$="[stock]"]');
                const val = stocks.first().val();
                stocks.slice(1).val(val);
            });

            $('#delete-all-variations').on('click', function () {
                tableBody.html('<tr><td colspan="6" class="text-center">All variations removed. Select attributes to regenerate.</td></tr>');
                choicesInstances.forEach(instance => instance.removeActiveItems());
            });

            $('#add-manual-variation').on('click', function () {
                const name = nameInput.val().trim().replace(/\s+/g, '-').toUpperCase() || 'SKU';
                const attributesHtml = [];
                @foreach ($attributes as $attribute)
                    attributesHtml.push(`
                                                                                                                                                                                                <div class="form-group mb-1">
                                                                                                                                                                                                    <label>{{ $attribute->name }}</label>
                                                                                                                                                                                                    <select name="variations[${manualVariationIndex}][attributes][{{ $attribute->id }}]" class="form-control form-control-sm">
                                                                                                                                                                                                        <option value="">-- Select {{ $attribute->name }} --</option>
                                                                                                                                                                                                        @foreach ($attribute->values as $value)
                                                                                                                                                                                                            <option value="{{ $value->id }}">{{ $value->value }}</option>
                                                                                                                                                                                                        @endforeach
                                                                                                                                                                                                    </select>
                                                                                                                                                                                                </div>`);
                @endforeach
                tableBody.append(`
                                                                                                    <tr data-manual-index="${manualVariationIndex}">
                                                                                                        <td>${attributesHtml.join('')}<input type="hidden" name="variations[${manualVariationIndex}][combination]" value=""></td>
                                                                                                        <td><input type="text" name="variations[${manualVariationIndex}][sku]" class="form-control" value="${name}-MANUAL-${manualVariationIndex}"></td>
                                                                                                        <td><input type="number" name="variations[${manualVariationIndex}][price]" class="form-control" step="0.01" placeholder="Price"></td>
                                                                                                        <td><input type="number" name="variations[${manualVariationIndex}][stock]" class="form-control" placeholder="Stock"></td>
                                                                                                        <td><input type="file" name="variations[${manualVariationIndex}][image]" class="form-control-file"></td>
                                                                                                        <td><button type="button" class="btn btn-danger btn-sm remove-variation">Remove</button></td>
                                                                                                    </tr>`);
                manualVariationIndex++;
            });

            function showEmptyMessageIfNeeded() {
                if ($('#variations-table tbody tr').length === 0) {
                    tableBody.html('<tr><td colspan="6" class="text-center">Select attributes to generate variations</td></tr>');
                }
            }
            $('.attribute-select').select2({
                placeholder: function () {
                    return $(this).data('placeholder');
                },
                allowClear: true, // Optional clear button
                width: '100%'
            });

        });
    </script>
@endsection