@extends('site.core.layout')

@section('content')
    <main>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <section class="headerBottom p-4">
            <div class="header d-flex justify-content-between">
                <span class="fw-bold">ELAN YERLƏŞDİRMƏK</span>
                <!-- <span>Lorem lorem lorem</span> -->
            </div>
        </section>
        <section class="p-4">
            <div>
                <ul>
                    <li>
                        Üç ay ərzində bir nəqliyyat vasitəsi yalnız bir dəfə pulsuz dərc
                        oluna bilər.
                    </li>
                    <li>
                        Üç ay ərzində təkrar və ya oxşar elanlar (marka/model, rəng)
                        ödənişlidir.
                    </li>
                    <li>
                        Elanınızı saytın ön sıralarında görmək üçün "İrəli çək"
                        xidmətindən istifadə edin.
                    </li>
                </ul>
            </div>
            <form action="{{ route('vehicle-submit') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="car_id">Maşınlar</label>
                            <select name="car_id" id="car_id" class="form-control">
                                <option value="">Seçin</option>
                                @foreach ($cars as $car)
                                    <option value="{{ $car->id }}">{{ $car->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="">Yanacaq növü</label>
                            <select name="fuel_type_id" id="" class="form-control">
                                <option value="">Seçin</option>
                                @foreach ($fuels as $fuel)
                                    <option value="{{ $fuel->id }}">{{ $fuel->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="model_id">Model</label>
                            <select name="model_id" id="model_id" class="form-control">
                                <option value="">Seçin</option>

                            </select>
                        </div>
                    </div>

                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="">Ötürücü</label>
                            <select name="gear_id" id="" class="form-control">
                                <option value="">Seçin</option>
                                @foreach ($gears as $gear)
                                    <option value="{{ $gear->id }}">{{ $gear->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="">Ban növü </label>
                            <select name="ban_id" id="" class="form-control">
                                <option value="">Seçin</option>
                                @foreach ($bans as $ban)
                                    <option value="{{ $ban->id }}">{{ $ban->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for=""> İl </label>
                            <select name="year" id="" class="form-control">
                                <option value="">Seçin</option>
                                @for ($i = date('Y'); $i >= 1904; $i--)
                                    <option value="{{ $i }}">{{ $i }}</option>
                                @endfor
                            </select>
                        </div>
                    </div>

                    <div class="col-12 col-md-6">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="price"> Qiymet </label>
                                    <input type="number" name="price" id="price" class="form-control">
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="currency_id">Valyuta</label>
                                    <select name="currency_id" class="form-control" id="">
                                        <option value="">Secin</option>
                                        @foreach ($currencies as $currency)
                                            <option value="{{ $currency->id }}">{{ $currency->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                        </div>



                    </div>



                    <div class=" col-12 col-md-6">
                        <div class="form-group">
                            <label for="color_id">Reng</label>
                            <select name="color_id" class="form-control" id="color_id">
                                <option value="">Secin</option>
                                @foreach ($colors as $color)
                                    <option value="{{ $color->id }}">{{ $color->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class=" col-12 col-md-6">
                        <div class="form-group">
                            <label for="distance"> Yurus (Km) </label>
                            <input type="number" name="distance" id="distance" class="form-control">
                        </div>
                    </div>

                    <div class=" col-12 col-md-6">
                        <div class="form-group">
                            <label for="vin_code"> Vin code </label>
                            <input type="text" name="vin_code" id="vin_code" class="form-control">
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="form-group">
                            <label for="body"> Haqqinda </label>
                            <textarea name="body" id="body" class="form-control" cols="30" rows="10"></textarea>
                        </div>
                    </div>


                    <div class="autoSupply mt-5">
                        <div class="autoSupplyName">Avtomobilin təchizatı</div>
                        <div class="row autoSupplyBlock">
                            @foreach ($suppliers as $supplier)
                                <div class="col-12 col-md-3">
                                    <div class="form-check">
                                        <input type="checkbox" name="supplier_ids[]" class="form-check-input"
                                            id="{{ $supplier->id }}" value="{{ $supplier->id }}" />
                                        <label for="{{ $supplier->id }}">{{ $supplier->name }}</label>
                                    </div>
                                </div>
                            @endforeach


                        </div>
                    </div>

                    <div class="col-12">
                        <div class="photos">
                            <div class="form-group">
                                <label for="photos">Sekiller</label>
                                <input type="file" name="photos[]" class="form-control" multiple>
                            </div>
                        </div>
                    </div>


                    <div class="contactInfo">
                        <div class="contactInfoName">Əlaqə</div>
                        <p>
                            Elan dərc olunduqdan sonra əlaqə məlumatları ilə bağlı heç bir
                            dəyişiklik həyata keçirilmir.
                        </p>
                        <div class="contactInfoBlock">

                            <div class="form-group">
                                <label for="city_id">Şəhər </label>
                                <select name="city_id" id="city_id" class="form-control">
                                    <option value="">Secin</option>
                                    @foreach ($cities as $city)
                                        <option value="{{ $city->id }}">{{ $city->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="contactInfoDesign">
                                <label for="">E-mail </label>
                                <input type="email" name="" id="" class="contactInfoDesignInput" />
                            </div>

                        </div>

                        <div class="addAutoSubButtonBlock">
                            <button type="submit" class="addAutoSubButton">
                                Davam et
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </section>
    </main>


    <script>
        // console.log('Salam');
        // alert('Salam')
        $(document).on('change', '#car_id', function(e) {
            let car_id = e.target.value;

            $.ajax({
                url: "/api/car-models/" + car_id,
                type: 'GET',
                dataType: 'json',
                success: function(response) {
                    $.each(response, function(key, value) {
                        $("#model_id").html("<option>Seçin</option>");
                        // console.log(value['name'])
                        $("#model_id").append('<option value="' + value['id'] + '">' + value[
                            'name'] + '</option>')
                    });
                }
            });

            // console.log(car_id);
        });
    </script>


@endsection
