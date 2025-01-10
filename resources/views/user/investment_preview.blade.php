@extends('user.base')
@section('content')

    <div class="pricing-area">
        <div class="container-fluid">
            <div class="row justify-content-center">
                @foreach($packages as $package)
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="card border shadow-sm">
                            <div class="card-header text-center bg-light">
                                <h5 class="fw-bold">{{ $package->name }} Package</h5>
                                <p class="mb-0"></p>
                            </div>
                            <div class="card-body text-center">
                                <h6 class="fw-bold  mb-1 mt-1">
                                    Get <strong class="text-primary fw-bold">{{ number_format($package->roi, 2) }}%</strong> ROI</h6>
                                <hr>
                                <h5 class="fw-bold mb-0">{{ $package->Duration }}</h5>
                                <small class="text-muted">Durations</small>
                            </div>
                            <ul class="list-group list-group-flush text-center">
                                <li class="list-group-item">
                                    <strong>Min Deposit:</strong> ${{ number_format($package->minAmount, 2) }}
                                </li>
                                <li class="list-group-item">
                                    <strong>Max Deposit:</strong>
                                    @if($package->unlimited != 1)
                                        ${{ number_format($package->maxAmount, 2) }}
                                    @else
                                        Unlimited
                                    @endif
                                </li>
                                <li class="list-group-item">
                                    <strong>Profit Withdrawal:</strong>
                                    {{ $package->returnTypes->name }}
                                </li>
                                <li class="list-group-item">
                                    <strong>Capital Withdrawal:</strong>
                                    {{ $package->capitalDuration }}
                                </li>
                                <li class="list-group-item">
                                    <strong>Total Return:</strong> {{ number_format($package->roi * $package->numberOfReturns, 2) }}%
                                </li>
                                <li class="list-group-item">
                                    <strong>Referral Bonus:</strong>
                                    {{ $package->referral }}%
                                </li>
                            </ul>
                            <div class="card-footer text-center bg-light">
                                <a href="{{ route('new_investment.select', ['id' => $package->id]) }}" class="btn btn-success w-100">
                                    Invest Now
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach


            </div>
        </div>
    </div>

@endsection
