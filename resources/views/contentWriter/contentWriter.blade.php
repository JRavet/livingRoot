@extends('layouts.app')

@section('title', 'Content Writer')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Content Writer</div>
                    {!! Form::open(['action' => 'ContentWriter@save']) !!}
                        @csrf
                        <textarea></textarea>
                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
