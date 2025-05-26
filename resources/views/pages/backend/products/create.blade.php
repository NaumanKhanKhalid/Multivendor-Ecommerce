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
                                            <!-- Banner Image Upload -->
                                            <div class="avatar-upload banner_image">
                                                <div class="avatar-edit">
                                                    <input type='file' id="banner_image" name="banner_image"
                                                        class="ec-image-upload" accept=".png, .jpg, .jpeg" />
                                                    <label for="banner_image">
                                                        <img src="{{ asset('backend/assets/img/icons/edit.svg') }}"
                                                            class="svg_img header_svg" alt="edit" />
                                                    </label>
                                                </div>
                                                <div class="avatar-preview ec-preview">
                                                    <div class="imagePreview ec-div-preview">
                                                        <img class="ec-image-preview"
                                                            src="{{ asset('backend/assets/img/products/vender-upload-preview.jpg') }}"
                                                            alt="Banner preview" />
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Thumbnail Uploads -->
                                            <div class="thumb-upload-set colo-md-12">
                                                @for ($i = 1; $i <= 6; $i++)
                                                    <div class="thumb-upload">
                                                        <div class="thumb-edit">
                                                            <input type='file' id="thumbUpload0{{ $i }}" name="thumbnails[]"
                                                                class="ec-image-upload" accept=".png, .jpg, .jpeg" />
                                                            <label for="thumbUpload0{{ $i }}">
                                                                <img src="{{ asset('backend/assets/img/icons/edit.svg') }}"
                                                                    class="svg_img header_svg" alt="edit" />
                                                            </label>
                                                        </div>
                                                        <div class="thumb-preview ec-preview">
                                                            <div class="image-thumb-preview">
                                                                <img class="image-thumb-preview ec-image-preview"
                                                                    src="{{ asset('backend/assets/img/products/vender-upload-thumb-preview.jpg') }}"
                                                                    alt="Thumbnail preview {{ $i }}" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endfor
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <!-- Product Form Section -->
                                <div class="col-lg-8">
                                    <form class="row g-3" id="create-product-form"
                                        action="{{ route('backend.products.store') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf

                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Product Name</label>
                                            <input type="text" name="name" class="form-control slug-title"
                                                placeholder="Enter product name">
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Select Categories</label>
                                            <select name="categories[]" multiple class="form-control category-select"
                                                data-placeholder="Select categories">
                                                @foreach ($categories as $thisCategory)
                                                    @if ($thisCategory->subcategories->count())
                                                        <optgroup label="{{ $thisCategory->name }}">
                                                            @foreach ($thisCategory->subcategories as $subcategory)
                                                                <option value="{{ $subcategory->id }}">{{ $subcategory->name }}</option>
                                                            @endforeach
                                                        </optgroup>
                                                    @else
                                                        <option value="{{ $thisCategory->id }}">{{ $thisCategory->name }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>


                                        <div class="col-md-6 mb-3" id="stock">
                                            <label class="form-label">Stock</label>
                                            <input type="number" name="stock" class="form-control"
                                                placeholder="Enter stock quantity" min="0">
                                        </div>

                                        <div class="col-md-6 mb-3" id="price">
                                            <label class="form-label">Price</label>
                                            <input type="number" name="price" class="form-control" placeholder="Enter price"
                                                step="0.01" min="0">
                                        </div>

                                        <div class="col-md-6 mb-3" id="sku">
                                            <label class="form-label">SKU</label>
                                            <input type="text" name="sku" class="form-control"
                                                placeholder="Enter SKU (e.g. ABC123)">
                                        </div>

                                        <div class="col-md-12 mb-3">
                                            <label class="form-label">Short Description</label>
                                            <textarea rows="3" name="short_description" class="form-control" maxlength="255"
                                                id="short_description"
                                                placeholder="Brief description (max 255 characters)"></textarea>
                                        </div>

                                        <div class="col-md-12 mb-3">
                                            <label class="form-label">Long Description</label>
                                            <textarea rows="5" name="long_description" class="form-control"
                                                placeholder="Detailed product description"></textarea>
                                        </div>

                                        <div class="col-md-12 mt-4">
                                            <label><strong>Meta Data</strong></label>
                                            <button type="button" class="btn btn-primary btn-sm mt-2 float-end"
                                                id="add-meta-row">Add Meta Data</button>
                                        </div>

                                        <div class="col-md-12 mt-3">
                                            <div id="meta-data-container">
                                                <div class="meta-row row align-items-center mb-2">
                                                    <div class="col-md-5 mb-3">
                                                        <input type="text" name="meta_keys[]" class="form-control"
                                                            placeholder="Meta Key (e.g. Weight)">
                                                    </div>
                                                    <div class="col-md-5 mb-3">
                                                        <input type="text" name="meta_values[]" class="form-control"
                                                            placeholder="Meta Value (e.g. 1000 g)">
                                                    </div>
                                                    <div class="col-auto ps-0 mb-3">
                                                        <button type="button"
                                                            class="btn btn-danger btn-sm remove-meta">Remove</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <label class="form-label"><strong>Product Type:</strong></label><br>

                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input product_type" type="radio"
                                                    name="product_type" id="simple" value="simple" checked>
                                                <label class="form-check-label" for="simple">Simple</label>
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input product_type" type="radio"
                                                    name="product_type" id="variable" value="variable">
                                                <label class="form-check-label" for="variable">Variable</label>
                                            </div>
                                        </div>

                                        <!-- Variation Method -->
                                        <div class="col-md-6" id="variation_method">
                                            <label><strong>Variation Method:</strong></label><br>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="variation_type"
                                                    id="auto-variation" value="auto" checked>
                                                <label class="form-check-label" for="auto-variation">Auto from
                                                    Attributes</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="variation_type"
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
                                        <div class="col-12" id="variation_buttons_div">
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
                                        <div class="col-12 mt-4" id="variations-table-div">
                                            <h4>Generated Variations:</h4>
                                            <div id="variations-table-wrapper">

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
                                                            <td colspan="6" class="text-center">Select attributes to
                                                                generate
                                                                variations</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js"></script>


    <script>

        $(document).ready(function () {

              

        
            // $('#create-product-form').on('submit', function (e) {
            //     e.preventDefault();
            //     let form = this;
            //     let formData = new FormData(form); // initialize with form fields

            //     // 🔁 Append banner image (outside the form)
            //     let bannerImage = $('#banner_image')[0].files[0];
            //     if (bannerImage) {
            //         formData.append('banner_image', bannerImage);
            //     }

            //     // 🔁 Append thumbnails (outside the form)
            //     $('input[name="thumbnails[]"]').each(function () {
            //         if (this.files[0]) {
            //             formData.append('thumbnails[]', this.files[0]);
            //         }
            //     });

            //     // ⛔ Optional: Disable submit button during request
            //     let submitBtn = $(form).find('button[type="submit"]');
            //     submitBtn.prop('disabled', true).text('Saving...');

            //     // 🛡️ CSRF token setup
            //     $.ajaxSetup({
            //         headers: {
            //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            //         }
            //     });

            //     // ✅ AJAX request
            //     $.ajax({
            //         url: $(form).attr('action'),
            //         method: 'POST',
            //         data: formData,
            //         contentType: false,
            //         processData: false,
            //         success: function (res) {
            //             flasher.success('Your message has been sent!', 'Thank You');

            //             // alert('Product saved successfully!');
            //             console.log(res);
            //             // Optional: reset form or redirect
            //         },
            //         error: function (xhr) {
            //             alert('Failed to save product.');
            //             console.error(xhr.responseText);
            //         },
            //         complete: function () {
            //             submitBtn.prop('disabled', false).text('Save Product');
            //         }
            //     });
            // });
$(document).on('click', '.btn-primary[type="submit"]', function (e) {
    e.preventDefault();

    let form = $(this).closest('form')[0];
    let formData = new FormData(form);

    // Manually append image data outside the form
    let bannerImage = $('#banner_image')[0].files[0];
    if (bannerImage) {
        formData.append('banner_image', bannerImage);
    }

    $('input[name="thumbnails[]"]').each(function(index, input) {
        if (input.files[0]) {
            formData.append('thumbnails[]', input.files[0]);
        }
    });

    // Optional: show loading spinner or disable button

    $.ajax({
        url: form.action,
        method: form.method,
        data: formData,
        processData: false,
        contentType: false,
        success: function (res) {
            // Optional: use PHPFlasher or toastr for flash message
            flasher.success("Product created successfully!");
            window.location.href = "{{ route('backend.products.index') }}";
        },
        error: function (xhr) {
            console.error(xhr.responseJSON);
            if (xhr.responseJSON?.errors) {
                let errors = xhr.responseJSON.errors;
                let messages = Object.values(errors).flat().join('<br>');
                flasher.error(messages);
            } else {
                flasher.error("Something went wrong.");
            }
        }
    });
});
            // Declare variables first
            const selects = $('.attribute-select');
            const tableBody = $('#variations-table tbody');
            const nameInput = $('input[name="name"]');
            const choicesInstances = [];
            let manualVariationIndex = 1000;

            // Now safe to call this function
            handleProductTypeChange();

            // Initialize Choices.js on selects and bind events
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

            $('input[name="variation_type"]').on('change', function () {
                const method = $(this).val();

                choicesInstances.forEach(instance => instance.removeActiveItems());
                tableBody.html('<tr>< td colspan="6" class="text-center"> Select attributes to generate variations. </td></tr> ');

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

            // Product type change event
            $('.product_type').on('change', handleProductTypeChange);

            function handleProductTypeChange() {
                const type = $('.product_type:checked').val();
                const variationMethod = $('input[name="variation_type"]:checked').val();

                if (type === 'simple') {
                    choicesInstances.forEach(instance => instance.removeActiveItems());
                    tableBody.html('<tr><td colspan="6" class="text-center"> Select attributes to generate variations.</td></tr> ');
                    $('#attribute-selectors').hide();
                    $('#add-manual-variation').hide();
                    $('#variations-table-div').hide();
                    $('#variation_buttons_div').hide();
                    $('#stock').show();
                    $('#price').show();
                    $('#sku').show();
                    $('#variation_method').hide();
                    $('#variations-table tbody').empty().html('<tr>< td colspan="6" class="text-center"> Select attributes to generate variations.</td> </tr> ');
                    $('.attribute-select').each(function () {
                        const choicesInstance = $(this).data('choices');
                        if (choicesInstance) choicesInstance.removeActiveItems();
                    });
                } else {
                    $('#variations-table-div').show();
                    $('#variation_buttons_div').show();
                    $('#variation_method').show();
                    $('#stock').hide();
                    $('#price').hide();
                    $('#sku').hide();
                    if (variationMethod === 'auto') {
                        $('#attribute-selectors').show();
                        $('#add-manual-variation').hide();
                        $('.attribute-select').prop('disabled', false);
                    } else {
                        $('#attribute-selectors').hide();
                        $('#add-manual-variation').show();
                        $('.attribute-select').prop('disabled', true);
                    }
                }
            }

            function updateVariations() {
                const selected = {};
                selects.each(function () {
                    const attrId = $(this).data('attribute-id');
                    selected[attrId] = [];
                    Array.from(this.selectedOptions).forEach(opt => {
                        selected[attrId].push({ id: opt.value, name: $(opt).data('value-name') });
                    });
                });
                const selectedValues = Object.values(selected).filter(arr => arr.length > 0);
                tableBody.empty();

                if (selectedValues.length === 0) {
                    showEmptyMessageIfNeeded();
                    return;
                }

                const combinations = getCombinations(selectedValues);

                if (!combinations.length) {
                    showEmptyMessageIfNeeded();
                    return;
                }

                const productName = nameInput.val().trim().replace(/\s+/g, '-').toUpperCase() || 'SKU';
                combinations.forEach((combo, index) => {
                    const label = combo.map(c => c.name).join(' / ');
                    const key = combo.map(c => c.id).join('_');
                    const valueNames = combo.map(c => c.name).join('-').toUpperCase();
                    const sku = `${productName}-${valueNames}`;
                    tableBody.append(`
            <tr>
                <td><input type="hidden" name="variations[${index}][combination]" value="${key}">${label}</td>
                <td><input type="text" name="variations[${index}][sku]" class="form-control" value="${sku}"></td>
                <td><input type="number" name="variations[${index}][price]" class="form-control" step="0.01" placeholder="Price">
                </td>
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
                tableBody.html('<tr>  < td colspan="6" class="text-center"> Select attributes to generate variations..</td> </tr> ');
                choicesInstances.forEach(instance => instance.removeActiveItems());
            });

            $('#add-manual-variation').on('click', function () {
                const name = nameInput.val().trim().replace(/\s+/g, '-').toUpperCase() || 'SKU';
                const attributesHtml = [];
                @foreach ($attributes as $attribute)
                    attributesHtml.push(`
                            <div class="form-group mb-1">
                                <label>{{ $attribute->name }}</label>
                                <select name="variations[${manualVariationIndex}][attributes][{{ $attribute->id }}]"
                                    class="form-control form-control-sm">
                                    <option value="">-- Select {{ $attribute->name }} --</option>
                                    @foreach ($attribute->values as $value)
                                        <option value="{{ $value->id }}">{{ $value->value }}</option>
                                    @endforeach
                                </select>
                            </div>
                            `);
                @endforeach
                tableBody.append(`
            <tr data-manual-index="${manualVariationIndex}">
                <td>${attributesHtml.join('')}<input type="hidden" name="variations[${manualVariationIndex}][combination]" value="">
                </td>
                <td><input type="text" name="variations[${manualVariationIndex}][sku]" class="form-control"
                        value="${name}-MANUAL-${manualVariationIndex}"></td>
                <td><input type="number" name="variations[${manualVariationIndex}][price]" class="form-control" step="0.01"
                        placeholder="Price"></td>
                <td><input type="number" name="variations[${manualVariationIndex}][stock]" class="form-control" placeholder="Stock">
                </td>
                <td><input type="file" name="variations[${manualVariationIndex}][image]" class="form-control-file"></td>
                <td><button type="button" class="btn btn-danger btn-sm remove-variation">Remove</button></td>
            </tr>
            `);
                manualVariationIndex++;
            });

            function showEmptyMessageIfNeeded() {
                if ($('#variations-table tbody tr').length === 0) {
                    tableBody.html('<tr> < td colspan="6" class="text-center"> Select attributes to generate variations</td></tr>');
                }
            }


            $('#add-meta-row').click(function () {
                const newRow = $(`
            <div class="meta-row row align-items-center mb-2">
                <div class="col-md-5 mb-10">
                    <input type="text" name="meta_keys[]" class="form-control" placeholder="Meta Key (e.g. Weight)">
                </div>
                <div class="col-md-5 mb-10">
                    <input type="text" name="meta_values[]" class="form-control" placeholder="Meta Value (e.g. 1000 g)">
                </div>
                <div class="col-auto mb-10 ps-0">
                    <button type="button" class="btn btn-danger btn-sm remove-meta">Remove</button>
                </div>
            </div>
            `);
                $('#meta-data-container').append(newRow);
            });

            $(document).on('click', '.remove-meta', function () {
                $(this).closest('.meta-row').remove();
            });

            const categorySelect = document.querySelector('.category-select');
            if (categorySelect) {
                new Choices(categorySelect, {
                    removeItemButton: true,
                    shouldSort: false,
                });
            }
        });
    </script>

@endsection