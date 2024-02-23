   @extends('main-page.layouts.main')
   @section('container')
       <div class="layout-wrapper layout-content-navbar layout-without-menu">
           <div class="layout-container">
               <!-- Layout container -->
               <div class="layout-page">
                   <!-- Content wrapper -->
                   <div class="content-wrapper">
                       <!-- Content -->
                       <div class="container-xxl flex-grow-1 container-p-y">
                           <div class="row mb-5">
                            @foreach ($items as $item)
                            <div class="col-md-3 col-lg-2 mb-3">
                                <a href="{{ $item->slug }}" class="card h-100">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ Str::limit($item->name, 12, '...') }}</h5>
                                        @php
                                            $imagePaths = explode(', ', $item->image);
                                            $firstImagePath = Str::before($imagePaths[0], ',');
                                        @endphp
                                        <img class="img-fluid d-flex mx-auto my-4 rounded" src="{{ $firstImagePath }}"
                                            alt="{{ $item->name }} picture" style="width: 200px; height: 150px;" />
                                        <p>
                                            @foreach ($item->categories as $categories)
                                                <span onclick="window.location='/'" class="badge bg-label-info mb-1">{{ $categories->name }}</span>
                                            @endforeach
                                        </p>
                                        <strong class="card-text">Rp. {{ $item->price }}</strong>
                                    </div>
                                </a>
                            </div>
                        @endforeach

                           </div>
                           <!--/ Layout Demo -->
                       </div>

                       <div class="content-backdrop fade"></div>
                   </div>
                   <!-- Content wrapper -->
               </div>
               <!-- / Layout page -->
           </div>
       </div>
   @endsection
