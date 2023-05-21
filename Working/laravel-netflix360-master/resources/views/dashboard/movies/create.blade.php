@extends('layouts.dashboard.app')

@push('styles')
    <style>
        #movie__upload-wrapper {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 25vh;
            flex-direction: column;
            cursor: pointer;
            border: 1px solid black;
        }
    </style>

@endpush

@section('content')

    <div>
        <h2>Movies</h2>
    </div>

    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard.welcome') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('dashboard.movies.index') }}">Movie</a></li>
        <li class="breadcrumb-item active">Add</li>
    </ul>

    <div class="row">
        <div class="col-md-12">
            <div class="tile mb-4">
                <form id="movie__properties"
                      method="post"
                      action="{{ route('dashboard.movies.update', ['movie' => $movie->id, 'type' => 'publish']) }}"
                      enctype="multipart/form-data"
                      
                >
                    @csrf
                    @method('put')

                    @include('dashboard.partials._errors')

                    {{--name--}}
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" id="movie__name" value="{{ old('name', $movie->name) }}" class="form-control">
                    </div>

                    {{--description--}}
                    <div class="form-group">
                        <label>Description</label>
                        <textarea name="description" class="form-control">{{ old('description', $movie->description) }}</textarea>
                    </div>
                    {{--link--}}
                    
                    <div class="form-group">
                        <label>Link</label>
                        <input type="text" name="link" class="form-control">{{ old('link', $movie->link) }}</input>
                    </div>
                
                    {{--poster--}}
                    <div class="form-group">
                        <label>Poster</label>
                        <input type="file" name="poster" class="form-control">
                    </div>

                    {{--image--}}
                    <div class="form-group">
                        <label>Image</label>
                        <input type="file" name="image" class="form-control">
                    </div>

                    {{--categories--}}
                    <div class="form-group">
                        <label>Category</label>
                        <select name="categories[]" class="form-control select2" multiple>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                        {{ in_array($category->id, $movie->categories->pluck('id')->toArray()) ? 'selected' : ''}}
                                >
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    {{--year--}}
                    <div class="form-group">
                        <label>Year</label>
                        <input type="text" name="year" value="{{ old('year', $movie->year) }}" class="form-control">
                    </div>

                    {{--rating--}}
                    <div class="form-group">
                        <label>Rating</label>
                        <input type="number" min="1" name="rating" value="{{ old('rating', $movie->rating) }}" class="form-control">
                    </div>

                    <div class="form-group">
                        <button type="submit" id="movie__submit-btn"  class="btn btn-primary"><i class="fa fa-plus"></i> Publish</button>
                    </div>

                </form><!-- end of form -->

            </div><!-- end of tile -->

        </div><!-- end of col -->

    </div><!-- end of row -->

@endsection