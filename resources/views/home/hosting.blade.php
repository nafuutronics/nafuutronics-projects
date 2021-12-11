@extends('layouts.app')

@section('content')
<div class="container px-5 my-5">
    <div class="text-center mb-5">
        <h1 class="fw-bolder">Projects Hosting</h1>
        <p class="lead fw-normal text-muted mb-0">We provide open hosting to our projects as well as outsourced projects</p>
    </div>
    <div class="row gx-5 table-responsive">
        <table class="table table-bordered table-hover">
            <tr>
                <th>Project</th>
                <th>Category</th>
                <th>URL</th>
                <th>Hosted On:</th>
            </tr>
            <tr>
                <td>Smart Aquarium</td>
                <td>IoT</td>
                <td><a href="/iot/smart-aquarium">https://projects.nafuutronics.com/iot/smart-aquarium</a></td>
                <td>06/06/2021</td>
            </tr>
            <tr>
                <td>Stunt Detector</td>
                <td>IoT</td>
                <td><a href="/iot/smart-bed">https://projects.nafuutronics.com/iot/smart-bed</a></td>
                <td>06/06/2021</td>
            </tr>
        </table>
    </div>
</div>
</section>
<section class="py-5 bg-light">
    <div class="container px-5 my-5">
        <p class="display-6 fw-bolder mb-4">Let's host your IoT project!</p>
        <a class="btn btn-lg btn-primary" href="contact">Contact us</a>
    </div>
</section>
@endsection
