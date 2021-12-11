@extends('layouts.model', ['title'=> 'Administration', 'service'=>'Direction / الاتجاه'])
@section('content')
@endsection
@section('menu')
    <div style="text-align: left; margin-left: 10px; margin-top: 10px">
        <table>
            <tr>
                <td>
                    <div style=""><img src="/images/exam.png" alt="HTML5 Icon" style="width:80px;height:80px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
                </td>
                <td>
                       <div class="card" style="background-color:#191970; vertical-align: middle;">
                        <a class="card-block stretched-link text-decoration-none" href="/accueilexamen">
                            <h2 style="color:#fff; text-align:center;" class="card-title center">إدارة الامتحانات/Gestion des examens</h2>
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
                    <a class="card-block stretched-link text-decoration-none" href="/retrait-diplomes">
                        <h2 style="color:#fff; text-align:center;" class="card-title center">سحب الدبلومات/Retrait des diplômes</h2>
                    </a>
                </div>
                </td>

            </tr>
            <tr>
                <td>
                    <div style=""><img src="/images/attestation.png" alt="HTML5 Icon" style="width:80px;height:80px;"></div>
                </td>
                  <td>
                     <div class="card" style="background-color:#191970; vertical-align: middle;">
                        <a class="card-block stretched-link text-decoration-none" href>
                            <h2 style="color:#fff; text-align:center;" class="card-title center">الشهادات/Attestations</h2>
                        </a>
                    </div>
                    </td>
            </tr>
            <tr>
                <td>
                    <div style=""><img src="/images/employe.png" alt="HTML5 Icon" style="width:80px;height:80px;"></div>
                </td>
                 <td>
                 <div class="card" style="background-color:#191970; vertical-align: middle;">
                    <a class="card-block stretched-link text-decoration-none"  href="/employes">
                        <h2 style="color:#fff; text-align:center;" class="card-title center">إدارة الموظفين/Gestion des Employés</h2>
                    </a>
                </div>
                </td>
            </tr>
        </table>



    </div>
    @endsection


