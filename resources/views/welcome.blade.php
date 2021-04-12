@extends('layouts.app')
@section('title')MY ADDRESSES @endsection
@section('content')
    <div class="center_box cb">
        <div class="uo_tabs cf">
            <a href="#"><span>profile</a>
            <a href="#"><span>Reviews</span></a>
            <a href="#"><span>orders</span></a>
            <a href="#" class="active"><span>My Address</span></a>
            <a href="#"><span>Settings</span></a>
        </div>
        <div class="page_content bg_gray">
            <div class="uo_header">
                <div class="wrapper cf">
                    <div class="wbox ava">
                        <figure><img src="imgc/user_ava_1_140.jpg" alt="Helena Afrassiabi"/></figure>
                    </div>
                    <div class="main_info">
                        <h1>Helena Afrassiabi</h1>
                        <div class="midbox">
                            <h4>560 points</h4>
                            <div class="info_nav">
                                <a href="#">Get Free Points</a>
                                <span class="sepor"></span>
                                <a href="#">Win iPad</a>
                            </div>
                        </div>
                        <div class="stat">
                            <div class="item">
                                <div class="num">30</div>
                                <div class="title">total orders</div>
                            </div>
                            <div class="item">
                                <div class="num">14</div>
                                <div class="title">total reviews</div>
                            </div>
                            <div class="item">
                                <div class="num">0</div>
                                <div class="title">total gifts</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="uo_body">
                <div class="wrapper">
                    <div class="uofb cf">
                        <div class="l_col adrs">
                            <h2>Add New Address</h2>

                            <form action="{{route('save_address')}}" method="POST">
                                @csrf
                                <div class="field">
                                    <label for="name">Name *</label>
                                    <input type="text" value="{{old('name')}}" name="name" placeholder=""
                                           class="vl_empty" id="name"
                                           required/>
                                    @error('name')
                                    {{$message}}
                                    @enderror
                                </div>
                                <div class="field">
                                    <label for="city">Your city *</label>
                                    <select name="city" id="city" class="vl_empty" required>
                                        <option value="" selected disabled>Choose</option>
                                        @foreach($cities as $item)
                                            <option @if($item->id === (int)old('city'))selected
                                                    @endif value="{{$item->id}}">{{$item->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('city')
                                    {{$message}}
                                    @enderror
                                </div>
                                <div class="field">
                                    <label for="area">Your area *</label>
                                    <select id="area" name="area" required>
                                        <option value="" selected disabled>Choose</option>
                                        @foreach($areas as $item)
                                            <option @if($item->id === (int)old('area'))selected
                                                    @endif value="{{$item->id}}">{{$item->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('area')
                                    {{$message}}
                                    @enderror
                                </div>

                                <div class="field">
                                    <label for="street">Street</label>
                                    <input type="text" id="street" name="street" value="{{old('street')}}"
                                           placeholder=""
                                           class="vl_empty"/>
                                </div>
                                <div class="field">
                                    <label for="house">House # </label>
                                    <input type="text" id="house" value="{{old('house')}}" name="house"
                                           placeholder="House Name / Number"/>
                                    @error('house')
                                    {{$message}}
                                    @enderror
                                </div>

                                <div class="field">
                                    <label for="additional" class="pos_top">Additional information</label>
                                    <textarea id="additional"
                                              name="additional_info">{{old('additional_info')}}</textarea>
                                    @error('additional_info')
                                    {{$message}}
                                    @enderror
                                </div>

                                <div class="field">
                                    <input type="submit" value="add address" class="green_btn"/>
                                </div>
                            </form>
                        </div>

                        <div class="r_col">
                            <h2>My Addresses</h2>

                            <div class="uo_adr_list">
                                @foreach($addresses as $item)
                                    <div class="item itemAddress" id="item-{{$item->id}}"
                                         data-address="{{$item->formatAddress()}}"
                                         data-id="{{$item->id}}"
                                         data-name="{{$item->name}}"
                                    >
                                        <h3>{{$item->name}}</h3>
                                        <p> {{$item->formatAddress()}} </p>
                                        @if($item->additional_info)
                                            <hr>
                                            <p>
                                                {{$item->additional_info}}
                                            </p>
                                        @endif
                                        <div class="actbox">
                                            <a href="{{route('delete_address',$item->id)}}" class="bcross"></a>
                                        </div>
                                        <div id="map-{{$item->id}}">

                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('script')
    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB8szXM448gkT5BM6YKBnIXkiF1E9pGhEQ&callback=initMap"
        async=""></script>
    <script src="{{asset('js/js.js')}}"></script>
@endsection
