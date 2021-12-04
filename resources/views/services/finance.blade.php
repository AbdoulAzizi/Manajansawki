@extends('layouts.model', ['title'=> 'Finance', 'service'=>'Service Finance / قسم المالية'])

@section('content')
@section('menu')
    <div style="text-align: left; margin-left: 10px; margin-top: 40px">
        <table>
         <tr>
            <td>
                <div style=""><img src="/images/bilan-icone.png" alt="HTML5 Icon" style="width:80px;height:80px;"></div>
            </td>

             <td>
                  <div class="card" style="background-color:#191970; min-width:400px;vertical-align: middle;">
                        <a class="card-block stretched-link text-decoration-none" href="/budgets">
                            <h2 style="color:#fff; text-align:center;" class="card-title center">إدارة الميزانية/Gestion du budget</h2>
                        </a>
                  </div>
                </td>
        </tr>
            <tr>
                <td>
                    <div style=""><img src="/images/finance.jpg" alt="HTML5 Icon" style="width:80px;height:80px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
                </td>

                 <td>
                  <div class="card" style="background-color:#191970; min-width:400px;vertical-align: middle;">
                        <a class="card-block stretched-link text-decoration-none" href>
                            <h2 style="color:#fff; text-align:center;" class="card-title center">إدارة حساب/Gestion des dépenses </h2>
                        </a>
                  </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div style=""><img src="/images/bilan-icone.png" alt="HTML5 Icon" style="width:80px;height:80px;"></div>
                </td>
                <td>
                     <div class="card" style="background-color:#191970; min-width:400px;vertical-align: middle;">
                            <a class="card-block stretched-link text-decoration-none" href>
                                <h2 style="color:#fff; text-align:center;" class="card-title center">التقييم والتقارير/Bilan et Rapports</h2>
                            </a>
                      </div>
                </td>
            </tr>

        </table>



    </div>
@endsection


@endsection
