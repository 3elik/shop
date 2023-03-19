@extends('layout.site')

@section('content')
    <h2>Order</h2>
    <form action="{{ route('basket.save-order') }}" method="post">
        @csrf
        <div class="form-group mt-2">
            <input type="text" class="form-control" name="name" placeholder="First name, Last name"

                   maxlength="255"
                   value="{{ old('name') ?? '' }}"
            >
        </div>
        <div class="form-group mt-2">
            <input type="email" class="form-control" name="email" placeholder="Email"

                   maxlength="255"
                   value="{{ old('email') ?? '' }}"
            >
        </div>
        <div class="form-group mt-2">
            <input type="text" class="form-control" name="phone" placeholder="Phone number"

                   maxlength="255"
                   value="{{ old('phone') ?? '' }}"
            >
        </div>
        <div class="form-group mt-2">
            <input type="text" class="form-control" name="address" placeholder="Address"

                   maxlength="255"
                   value="{{ old('address') ?? '' }}"
            >
        </div>
        <div class="form-group mt-2">
            <textarea class="form-control" name="comment" placeholder="Comment"

                      maxlength="255"
                      rows="2"
            >{{ old('comment') ?? '' }}</textarea>
        </div>
        <div class="form-group mt-2">
            <button type="submit" class="btn btn-success">Order</button>
        </div>
    </form>
@endsection
