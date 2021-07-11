@extends('layouts.user-profile-wide')

@section('subtitle', trans('app.family_tree'))

@section('user-content')

    <?php
    $childsTotal = 0;
    $grandChildsTotal = 0;
    $ggTotal = 0;
    $ggcTotal = 0;
    $ggccTotal = 0;
    $couplesTotal = 0;
    $pchildsTotal = 0;
    $CouplechildsTotal = 0;
    $GrandchildsTotal = 0;
    $GrandCouplechildsTotal = 0;
    $GrandGrandchildsTotal = 0;
    $GreatGrandCouplechildsTotal =0;
    $GreatGrandGrandchildsTotal =0
    ?>
    <div id="wrapper">
        <span
            class="label">{{ link_to_route('users.tree', $user->name, [$user->id], ['title' => $user->name . ' (' . $user->gender . ')']) }}
            @if ($user->gender == 'F')
                <img src="{{ asset('images/female.png') }}" style="float: left;">
            @else
                <img src="{{ asset('images/male.png') }}" style="float: left;">
            @endif
        </span>
        @if ($pasanganCount = count($data))
            <?php $couplesTotal += $pasanganCount; ?>
            <div class="branch lv1">
                @foreach ($data as $pasangan)
                    <div class="entry {{ $pasanganCount == 1 ? 'sole' : '' }}">
                        <span
                            class="label2">{{ link_to_route('users.tree', $pasangan->name, [$pasangan->id], ['title' => $pasangan->name . ' (' . $pasangan->gender . ')']) }}
                            @if ($pasangan->gender == 'F')
                                <img src="{{ asset('images/female.png') }}" style="float: left;">
                            @else
                                <img src="{{ asset('images/male.png') }}" style="float: left;">
                            @endif
                        </span>
                        @if ($childsCount = $pasangan->childs->count())
                            <?php $childsTotal += $childsCount; ?>
                            <div class="branch lv2">
                                @foreach ($pasangan->childs as $child)
                                    <div class="entry {{ $childsCount == 1 ? 'sole' : '' }}">
                                        <span
                                            class="label">{{ link_to_route('users.tree', $child->name, [$child->id], ['title' => $child->name . ' (' . $child->gender . ')']) }}
                                            @if ($child->gender == 'F')
                                                <img src="{{ asset('images/female.png') }}" style="float: left;">
                                            @else
                                                <img src="{{ asset('images/male.png') }}" style="float: left;">
                                            @endif
                                        </span>
                                        @php
                                            if ($child->gender_id == 1) {
                                                $data2 = $child->wifes;
                                            } else {
                                                $data2 = $child->husbands;
                                            }
                                        @endphp
                                        @if ($pchildsCount = $child->wifes->count() or $pchildsCount = $child->wifes->count())
                                            <?php $pchildsTotal += $pchildsCount; ?>
                                            <div class="branch lv3">
                                                @foreach ($data2 as $pasanganchild)
                                                    <div class="entry {{ count($data2) == 1 ? 'sole' : '' }}">
                                                        <span
                                                            class="label2">{{ link_to_route('users.tree', $pasanganchild->name, [$pasanganchild->id], ['title' => $pasanganchild->name . ' (' . $pasanganchild->gender . ')']) }}

                                                            @if ($pasanganchild->gender == 'F')
                                                            
                                                                <img src="{{ asset('images/female.png') }}"
                                                                    style="float: left;">
                                                            @else
                                                                <img src="{{ asset('images/male.png') }}"
                                                                    style="float: left;">
                                                            @endif
                                                        </span>
                                                        @if ($CouplechildsCount = $pasanganchild->childs->count())
                                                            <?php $CouplechildsTotal += $CouplechildsCount;
                                                            ?>
                                                            <div class="branch lv4">
                                                                @foreach ($pasanganchild->childs as $CoupleChild)
                                                                    <div
                                                                        class="entry {{ $CouplechildsCount == 1 ? 'sole' : '' }}">
                                                                        <span
                                                                            class="label">{{ link_to_route('users.tree', $CoupleChild->name, [$CoupleChild->id], ['title' => $CoupleChild->name . ' (' . $CoupleChild->gender . ')']) }}
                                                                            @if ($CoupleChild->gender == 'F')
                                                                                <img src="{{ asset('images/female.png') }}"
                                                                                    style="float: left;">
                                                                            @else
                                                                                <img src="{{ asset('images/male.png') }}"
                                                                                    style="float: left;">
                                                                            @endif
                                                                        </span>
                                                                        @php
                                                                            if ($CoupleChild->gender_id == 1) {
                                                                                $data3 = $CoupleChild->wifes;
                                                                            } else {
                                                                                $data3 = $CoupleChild->husbands;
                                                                            }
                                                                        @endphp
                                                                        @if ($GrandchildsCount = $CoupleChild->wifes->count() or $GrandchildsCount = $CoupleChild->husbands->count())
                                                                            <?php $GrandchildsTotal += $GrandchildsCount; ?>
                                                                            <div class="branch lv5">
                                                                                @foreach ($data3 as $Grandchilds)
                                                                                    <div
                                                                                        class="entry {{ count($data3) == 1 ? 'sole' : '' }}">
                                                                                        <span
                                                                                            class="label2">{{ link_to_route('users.tree', $Grandchilds->name, [$Grandchilds->id], ['title' => $Grandchilds->name . ' (' . $Grandchilds->gender . ')']) }}
                                                                                            @if ($Grandchilds->gender == 'F')
                                                                                                <img src="{{ asset('images/female.png') }}"
                                                                                                    style="float: left;">
                                                                                            @else
                                                                                                <img src="{{ asset('images/male.png') }}"
                                                                                                    style="float: left;">
                                                                                            @endif
                                                                                        </span>
                                                                                        @if ($GrandCouplechildsCount = $Grandchilds->childs->count())
                                                                                            <?php $GrandCouplechildsTotal += $GrandCouplechildsCount; ?>
                                                                                            <div class="branch lv6">
                                                                                                @foreach ($Grandchilds->childs as $GrandCouplechilds)
                                                                                                    <div
                                                                                                        class="entry {{ $GrandCouplechildsCount == 1 ? 'sole' : '' }}">
                                                                                                        <span
                                                                                                            class="label">{{ link_to_route('users.tree', $GrandCouplechilds->name, [$GrandCouplechilds->id], ['title' => $GrandCouplechilds->name . ' (' . $GrandCouplechilds->gender . ')']) }}
                                                                                                            @if ($GrandCouplechilds->gender == 'F')
                                                                                                                <img src="{{ asset('images/female.png') }}"
                                                                                                                    style="float: left;">
                                                                                                            @else
                                                                                                                <img src="{{ asset('images/male.png') }}"
                                                                                                                    style="float: left;">
                                                                                                            @endif
                                                                                                        </span>
                                                                                                        @php
                                                                                                            if ($GrandCouplechilds->gender_id == 1) {
                                                                                                                $data4 = $GrandCouplechilds->wifes;
                                                                                                            } else {
                                                                                                                $data4 = $GrandCouplechilds->husbands;
                                                                                                            }
                                                                                                        @endphp
                                                                                                        @if ($GrandGrandChildsCount = $GrandCouplechilds->wifes->count() or $GrandGrandChildsCount = $GrandCouplechilds->husbands->count())
                                                                                                            <?php $GrandGrandchildsTotal +=  $GrandGrandChildsCount; ?>
                                                                                                            <div
                                                                                                                class="branch lv7">
                                                                                                                @foreach ($data4 as $GrandGrandchilds)
                                                                                                                    <div
                                                                                                                        class="entry {{ count($data4) == 1 ? 'sole' : '' }}">
                                                                                                                        <span
                                                                                                                            class="label2">{{ link_to_route('users.tree', $GrandGrandchilds->name, [$GrandGrandchilds->id], ['title' => $GrandGrandchilds->name . ' (' . $GrandGrandchilds->gender . ')']) }}
                                                                                                                            @if ($GrandGrandchilds->gender == 'F')
                                                                                                                                <img src="{{ asset('images/female.png') }}"
                                                                                                                                    style="float: left;">
                                                                                                                            @else
                                                                                                                                <img src="{{ asset('images/male.png') }}"
                                                                                                                                    style="float: left;">
                                                                                                                            @endif
                                                                                                                        </span>
                                                                                                                        @if ($GreatGrandCouplechildsCount = $GrandGrandchilds->childs->count())
                                                                                                                            <?php $GreatGrandCouplechildsTotal += $GreatGrandCouplechildsCount; ?>
                                                                                                                            <div class="branch lv8">
                                                                                                                                @foreach ($GrandGrandchilds->childs as $GreatGrandCouplechilds)
                                                                                                                                    <div
                                                                                                                                        class="entry {{ $GreatGrandCouplechildsCount == 1 ? 'sole' : '' }}">
                                                                                                                                        <span
                                                                                                                                            class="label">{{ link_to_route('users.tree', $GreatGrandCouplechilds->name, [$GreatGrandCouplechilds->id], ['title' => $GreatGrandCouplechilds->name . ' (' . $GreatGrandCouplechilds->gender . ')']) }}
                                                                                                                                            @if ($GreatGrandCouplechilds->gender == 'F')
                                                                                                                                                <img src="{{ asset('images/female.png') }}"
                                                                                                                                                    style="float: left;">
                                                                                                                                            @else
                                                                                                                                                <img src="{{ asset('images/male.png') }}"
                                                                                                                                                    style="float: left;">
                                                                                                                                            @endif
                                                                                                                                        </span>
                                                                                                                                        @php
                                                                                                                                            if ($GreatGrandCouplechilds->gender_id == 1) {
                                                                                                                                                $data5 = $GreatGrandCouplechilds->wifes;
                                                                                                                                            } else {
                                                                                                                                                $data5 = $GreatGrandCouplechilds->husbands;
                                                                                                                                            }
                                                                                                                                        @endphp
                                                                                                                                        @if ($GreatGrandGrandChildsCount = $GreatGrandCouplechilds->wifes->count() or $GreatGrandGrandChildsCount = $GreatGrandCouplechilds->husbands->count())
                                                                                                                                            <?php $GreatGrandGrandchildsTotal +=  $GreatGrandGrandChildsCount; ?>
                                                                                                                                            <div class="branch lv9">
                                                                                                                                                @foreach ($data5 as $GreatGrandGrandchilds)
                                                                                                                                                    <div
                                                                                                                                                        class="entry {{ count($data5) == 1 ? 'sole' : '' }}">
                                                                                                                                                        <span
                                                                                                                                                            class="label2">{{ link_to_route('users.tree', $GreatGrandGrandchilds->name, [$GreatGrandGrandchilds->id], ['title' => $GreatGrandGrandchilds->name . ' (' . $GreatGrandGrandchilds->gender . ')']) }}
                                                                                                                                                            @if ($GreatGrandGrandchilds->gender == 'F')
                                                                                                                                                                <img src="{{ asset('images/female.png') }}"
                                                                                                                                                                    style="float: left;">
                                                                                                                                                            @else
                                                                                                                                                                <img src="{{ asset('images/male.png') }}"
                                                                                                                                                                    style="float: left;">
                                                                                                                                                            @endif
                                                                                                                                                        </span>
                                                                                                                                                    </div>
                                                                                                                                                @endforeach
                                                                                                                                            </div>
                                                                                                                                        @endif
                                                                                                                                    </div>
                                                                                                                                @endforeach
                                                                                                                            </div>
                                                                                                                        @endif
                                                                                                                    </div>
                                                                                                                @endforeach
                                                                                                            </div>
                                                                                                        @endif
                                                                                                    </div>
                                                                                                @endforeach
                                                                                            </div>
                                                                                        @endif
                                                                                    </div>
                                                                                @endforeach
                                                                            </div>
                                                                        @endif
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                        @endif
                                                    </div>
                                                @endforeach
                                            </div>
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                @endforeach
            </div>
        @endif
    </div>

    {{-- <div class="container">
        <hr>
        <div class="row">
            <div class="col-md-1">&nbsp;</div>
            @if ($childsTotal)
                <div class="col-md-1 text-right">{{ trans('app.child_count') }}</div>
                <div class="col-md-1 text-left"><strong style="font-size:30px">{{ $childsTotal }}</strong></div>
            @endif
            @if ($grandChildsTotal)
                <div class="col-md-1 text-right">{{ trans('app.grand_child_count') }}</div>
                <div class="col-md-1 text-left"><strong style="font-size:30px">{{ $grandChildsTotal }}</strong></div>
            @endif
            @if ($ggTotal)
                <div class="col-md-1 text-right">Jumlah Cicit</div>
                <div class="col-md-1 text-left"><strong style="font-size:30px">{{ $ggTotal }}</strong></div>
            @endif
            @if ($ggcTotal)
                <div class="col-md-1 text-right">Jumlah Canggah</div>
                <div class="col-md-1 text-left"><strong style="font-size:30px">{{ $ggcTotal }}</strong></div>
            @endif
            @if ($ggccTotal)
                <div class="col-md-1 text-right">Jumlah Wareng</div>
                <div class="col-md-1 text-left"><strong style="font-size:30px">{{ $ggccTotal }}</strong></div>
            @endif
            <div class="col-md-1">&nbsp;</div>
        </div> --}}
@endsection

@section('ext_css')
    <link rel="stylesheet" href="{{ asset('css/tree.css') }}">
@endsection