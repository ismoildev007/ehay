@extends('layouts.admin')

@section('content')
    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data" novalidate class="needs-validation" onsubmit="updateEditorContent()">
        @csrf

        <main class="nxl-container">
            <div class="nxl-content">
                <div class="page-header">
                    <div class="page-header-left d-flex align-items-center">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Создать продукт</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Главная</a></li>
                            <li class="breadcrumb-item">Продукты</li>
                        </ul>
                    </div>
                    <div class="page-header-right ms-auto">
                        <button type="submit" class="btn btn-primary">Создать</button>
                    </div>
                </div>

                @if ($errors->any())
                    <div class="alert alert-danger m-3">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="main-content">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="card stretch">
                                <div class="card-header">
                                    <h5 class="card-title">Детали продукта</h5>
                                </div>
                                <div class="card-body p-4">
                                    <ul class="nav-tab-items-wrapper nav nav-justified invoice-overview-tab-item">
                                        <li class="nav-item">
                                            <a href="javascript:void(0);" class="nav-link active" data-bs-toggle="tab" data-bs-target="#uzContent">O'zbekcha</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="javascript:void(0);" class="nav-link" data-bs-toggle="tab" data-bs-target="#enContent">English</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="javascript:void(0);" class="nav-link" data-bs-toggle="tab" data-bs-target="#ruContent">Русский</a>
                                        </li>
                                    </ul>

                                    @php
                                        $languages = ['uz' => 'UZ', 'en' => 'EN', 'ru' => 'RU'];
                                    @endphp

                                    <div class="tab-content pt-3">
                                        @foreach ($languages as $code => $label)
                                            <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}" id="{{ $code }}Content">
                                                <div class="form-group pb-3">
                                                    <label for="name_{{ $code }}">Название ({{ $label }}):</label>
                                                    <input type="text" class="form-control" id="name_{{ $code }}" name="name_{{ $code }}" value="{{ old('name_' . $code, $product->{"name_$code"} ?? '') }}" required>
                                                </div>

                                                <div class="form-group pb-3">
                                                    <label for="description_{{ $code }}">Описание ({{ $label }}):</label>
                                                    <textarea class="form-control" id="description_{{ $code }}" name="description_{{ $code }}" rows="3">{{ old('description_' . $code, $product->{"description_$code"} ?? '') }}</textarea>
                                                </div>

                                                <div class="form-group pb-3">
                                                    <label for="content_{{ $code }}">Содержимое ({{ $label }}):</label>
                                                    <div id="editor_{{ $code }}" style="height:200px;"></div>
                                                    <input type="hidden" id="text_{{ $code }}" name="content_{{ $code }}" value="{{ old('content_' . $code, $product->{"content_$code"} ?? '') }}">
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="card stretch">
                                <div class="card-body p-4">
                                    <div class="form-group pb-3">
                                        <select name="category_id" id="category_id" class="form-control" data-select2-selector="status">
                                            <option selected disabled>Categoriya tanlang ...</option>
                                            @foreach($categories as $item)
                                                <option value="{{ $item->id }}">{{ $item->name_ru }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group pb-3">
                                        <label for="price">Price :</label>
                                        <input type="text" class="form-control" id="price" name="price" value="{{ old('price') }}" required>
                                    </div>
                                    <div class="form-group pb-3">
                                        <label for="discount">Discount :</label>
                                        <input type="text" class="form-control" id="discount_percent" name="discount_percent" value="{{ old('discount_percent') }}" required>
                                    </div>
                                    <div class="form-group pb-3">
                                        <select name="type" id="type" class="form-control" data-select2-selector="status">
                                            <option selected disabled>Turini tanlang ...</option>
                                            @foreach(\App\Models\Product::typeArr() as  $value => $str)
                                                <option value="{{ $value }}">{{ $str }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group pb-3">
                                        <label for="image">Изображение:</label>
                                        <input type="file" class="form-control" id="image" name="image">
                                    </div>
                                    <div class="form-group pb-3">
                                        <label for="images">Изображение (4):</label>
                                        <input type="file" class="form-control" id="images" name="images">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </form>

    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">

    <script>
        var editorUz = new Quill('#editor_uz', { theme: 'snow' });
        var editorEn = new Quill('#editor_en', { theme: 'snow' });
        var editorRu = new Quill('#editor_ru', { theme: 'snow' });

        function updateEditorContent() {
            document.getElementById('text_uz').value = editorUz.root.innerHTML;
            document.getElementById('text_en').value = editorEn.root.innerHTML;
            document.getElementById('text_ru').value = editorRu.root.innerHTML;
        }

        document.querySelector('form').addEventListener('submit', function(event){
            updateEditorContent();
        });
    </script>
@endsection
