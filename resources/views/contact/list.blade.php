@extends('layouts.app')

@section('content')
    <a href={{ route("contact_create") }}>Create New</a>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="content">
                        @if($contacts->isEmpty())
                            <div class="title m-b-md">
                                No Records Found.
                            </div>
                        @else
                            @foreach( $contacts as $contact)
                                <div class="title m-b-md">
                                    {{ $loop->iteration }}. <a href="{{ route("contact_edit", ['id'=>$contact->id]) }}">{{ $contact->name }}</a>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection