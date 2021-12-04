@extends('accueil')
@extends('layouts.app')
@section('content')

    <div>
        <div>
            <div>
            <!--        <div class="card-header">Dashboard</div>  -->

                <div>

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

        </div>
            </div>
        </div>
    </div>

@endsection
