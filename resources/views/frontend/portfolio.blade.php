@extends('frontend.layout.master')
@section('title', 'Portfolio Details - Beatnik Technology Limited')

@section('content')

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <ol>
          <li><a href="{{ url('/') }}">Home</a></li>
          <li>Portfolio Details</li>
        </ol>
        <h2>Portfolio Details</h2>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Portfolio Details Section ======= -->
    <section id="portfolio-details" class="portfolio-details">
      <div class="container" data-aos="fade-up">

        <div class="portfolio-details-container">

          <div class="owl-carousel portfolio-details-carousel">
            <img src="{{ asset('uploads/'.$portfolio->images[0]) }}" class="img-fluid" alt="">
            <img src="{{ asset('uploads/'.$portfolio->images[1]) }}" class="img-fluid" alt="">
            <img src="{{ asset('uploads/'.$portfolio->images[2]) }}" class="img-fluid" alt="">
          </div>

          <div class="portfolio-info">
            <h3>Project information</h3>
            <ul>
              <li><strong>Category</strong>: {{ $portfolio->category }} @if ($portfolio->category == 'Card') {{ 'Design' }} @else {{ 'Development' }} @endif</li>
              <li><strong>Client</strong>: {{ $portfolio->client }}</li>
              <li><strong>Project date</strong>: {{ $portfolio->created_at->format('F j, Y') }}</li>
              <li><strong>Project URL</strong>: <a href="{{ $portfolio->url }}">{{ $portfolio->url }}</a></li>
            </ul>
          </div>

        </div>

        <div class="portfolio-description">
          <h2>{{ $portfolio->name }}</h2>
          <p>{{ $portfolio->description }}</p>
        </div>

      </div>
    </section><!-- End Portfolio Details Section -->

  </main><!-- End #main -->

@endsection