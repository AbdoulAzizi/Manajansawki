@extends('layouts.model', ['title'=> 'Direction', 'service'=>'Direction /الاتجاه'])

@section('content')
@section('menu')
    <div style="text-align: left; margin-left: 10px; margin-top: 40px">
        <table>
            <tr>
                <td>
                    <div style=""><img src="/images/exam.png" alt="HTML5 Icon" style="width:80px;height:80px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
                </td>

                <td>
                    <div class="card" style="background-color:#191970; vertical-align: middle;">
                        <a class="card-block stretched-link text-decoration-none" href="/examens">
                            <h2 style="color:#fff; text-align:center;" class="card-title center">امتحانات التخطيط/Planification des examens</h2>
                        </a>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div style=""><img src="/images/rapport.png" alt="HTML5 Icon" style="width:80px;height:80px;"></div>
                </td>
                <td>
                    <div class="card" style="background-color:#191970; vertical-align: middle;">
                        <a class="card-block stretched-link text-decoration-none" href="/convocations">
                            <h2 style="color:#fff; text-align:center;" class="card-title center">Convocations/دعوات</h2>
                        </a>
                    </div>
                </td>
            </tr>


        </table>



    </div>
@endsection
@endsection
