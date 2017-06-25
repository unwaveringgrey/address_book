@extends('layouts.app')

@section('content')
    <div class="container">
        <form role="form" method="POST" action="{{ route('contact_save', ['id'=>$contact->id]) }}">
            {{ csrf_field() }}
            <div class="col-md-6">
                Contact Name:<input id="name" type="name" class="form-control" name="name" value="{{ old('name', $contact->name) }}" required>

                @if ($errors->has('name'))
                    <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                @endif
                Email Address:<input id="email_address" type="email" class="form-control" name="email_address" value="{{ old('email_address', $email_address->email_address) }}" required>

                @if ($errors->has('email_address'))
                    <span class="help-block">
                            <strong>{{ $errors->first('email_address') }}</strong>
                        </span>
                @endif
                Address:<input id="address" class="form-control" name="address" value="{{ old('address', $address->address) }}" required>

                @if ($errors->has('address'))
                    <span class="help-block">
                            <strong>{{ $errors->first('address') }}</strong>
                        </span>
                @endif
                Phone Number:<input id="number" class="form-control" name="number" value="{{ old('number', $phone_number->number) }}" required>

                @if ($errors->has('number'))
                    <span class="help-block">
                            <strong>{{ $errors->first('number') }}</strong>
                        </span>
                @endif
                Number Type:<input id="number_type" class="form-control" name="number_type" value="{{ old('number_type', $phone_number->number_type) }}" required>

                @if ($errors->has('number_type'))
                    <span class="help-block">
                            <strong>{{ $errors->first('number_type') }}</strong>
                        </span>
                @endif
            </div>

            <button class="btn btn-default" type="submit" value="Save">Submit</button>
        </form>
        <a href="{{route('contact_list')}}" class="btn btn-default">Cancel</a>

        @if($contact->id != 0)
            <form action="{{route('contact_delete', ['id'=>$contact->id])}}" method="POST">
                <input type="hidden" name="_method" value="DELETE">
                {{ csrf_field() }}
                <button class="btn btn-default" value="Delete">Delete</button>
            </form>
        @endif

    </div>
@endsection