@extends('layouts.model', ['title'=> 'Secrétariat', 'service'=>'Secrétariat / سكرتارية'])

@section('content')
@section('menu')
    <div style="text-align: left; margin-left: 10px; margin-top: 40px">
        <table>
            <tr>
                <td>
                    <div style=""><img src="/images/sign-up-icon.png" alt="HTML5 Icon" style="width:80px;height:80px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
                </td>
                <td>
                   <div class="card" style="background-color:#191970; vertical-align: middle;">
                    <a class="card-block stretched-link text-decoration-none" href="/etudiants">
                        <h2 style="color:#fff; text-align:center;" class="card-title center">إدارة التسجيل/Gestion des Inscriptions</h2>
                    </a>
                </div>
            </td>

            </tr>
            <tr>
                <td>
                    <div style=""><img src="/images/abscence.png" alt="HTML5 Icon" style="width:80px;height:80px;"></div>
                </td>
                  <td>
                   <div class="card" style="background-color:#191970; vertical-align: middle;">
                    <a class="card-block stretched-link text-decoration-none" href>
                        <h2 style="color:#fff; text-align:center;" class="card-title center">إدارة التأخيرات والغياب/Gestion des retards et des absences</h2>
                    </a>
                </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div style=""><img src="/images/doc.png" alt="HTML5 Icon" style="width:80px;height:80px;"></div>
                </td>

                 <td>
                      <div class="card" style="background-color:#191970; min-width:400px;vertical-align: middle;">
                            <a class="card-block stretched-link text-decoration-none" href="groupes">
                                <h2 style="color:#fff; text-align:center;" class="card-title center">إدارة المجموعة/Gestion des groupes</h2>
                            </a>
                      </div>
                </td>
        </tr>

         <tr>
                        <td>
                            <div style=""><img src="/images/doc.png" alt="HTML5 Icon" style="width:80px;height:80px;"></div>
                        </td>

                         <td>
                              <div class="card" style="background-color:#191970; min-width:400px;vertical-align: middle;">
                                    <a class="card-block stretched-link text-decoration-none" href="/matieres">
                                        <h2 style="color:#fff; text-align:center;" class="card-title center">Gestion des Matières</h2>
                                    </a>
                              </div>
                        </td>
                </tr>
        </table>



    </div>
@endsection



@endsection
