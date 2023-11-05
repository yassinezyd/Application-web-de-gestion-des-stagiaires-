<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Tables - SB Admin</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="/index">Menu</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <!-- <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div> -->
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                      
                        <li><a class="dropdown-item" href="/">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="/index">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <div class="sb-sidenav-menu-heading">Interface</div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Stagiaire
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="/listestagiaire">Listes Stagiaires</a>
                                    <a class="nav-link" href="/ajouterstagiaire">Ajouter Stagiaires</a>
                                </nav>
                            </div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Encadrant
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="/listeencadrant">Listes Encadrant</a>
                                    <a class="nav-link" href="/AjouterEnadrant">Ajouter Encadrant</a>
                                </nav>
                            </div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Sujet
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="/listesujet">Listes Sujet</a>
                                    <a class="nav-link" href="/ajouterSujet">Ajouter Sujet</a>
                                </nav>
                            </div>
                            <div class="sb-sidenav-menu-heading">Addons</div>
                            
                            <a class="nav-link" href="/">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Log out
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Table des Sujets</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="/index">Dashboard</a></li>
                            <li class="breadcrumb-item active">Table</li>
                        </ol>
                        
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Sujet</th>
                                            <th>Full Name d'Encadrant</th>
                                            <th>Full name Stagiaire 1 </th>
                                            <th>Full name Stagiaire 2</th>
                                            <th>Les Langages</th>
                                            <th>Description</th>
                                            <th>Rapport</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Sujet</th>
                                            <th>Full Name d'Encadrant</th>
                                            <th>Full name Stagiaire 1 </th>
                                            <th>Full name Stagiaire 2</th>
                                            <th>Les Langages</th>
                                            <th>Description</th>
                                            <th>Rapport</th>
                                            <th>Action</th>
                                             
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach($sujet as $sujet)
                                        <tr>
                                            <td>{{$sujet->sujet}}</td>
                                            <td>{{$sujet->nameen}}</td>
                                            <td>{{$sujet->namestag1}}</td>
                                            <td>{{$sujet->namestag2}}</td>
                                            <td>{{$sujet->langage}}</td>
                                            <td>{{$sujet->descption}}</td>
                                            <td>
                                                 @if($sujet->rappoert)
                                                 <a href="{{ route('sujet.showRapport', $sujet->id) }}" target="_blank">Voir le rapport</a>
                                                 @else
                                                  Aucun rapport
                                                 @endif
                                            </td>
                                            <td>
                                                <div class="btn-group">
                                                    <form action="{{ route('sujet.destroy', $sujet->id) }}" method="POST">
                                                      @csrf
                                                       @method('DELETE')
                                                       <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash fa-sm">

                                                       </i> 
                                                       </button>
                                                     </form>
                                                     <span class="mx-1"></span>
                                                     <a href="{{ route('sujet.edit', $sujet->id) }}"class="btn btn-success btn-sm">
                                                        <i class="fas fa-edit fa-xs"></i> 
                                                     </a>
                                                </div>
                                            </td>
                                         </tr>
                                         @endforeach
           
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
            </div>  
              
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>
