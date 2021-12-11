@extends('layouts.app')

@section('content')
<div class="container px-5 my-5">
    <div class="text-center mb-5">
        <h1 class="fw-bolder">IoT Projects Hosting</h1>
        <p class="lead fw-normal text-muted mb-0">In this page you can find list of all public hosted IoT projects, click the project to see details of data collection and controlling actions.</p>
    </div>
    <div class="row gx-5 table-responsive">
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>Project</th>
                    <th>Category</th>
                    <th>Hosted Since</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <a href="/iot/smart-aquarium">Smart Aquarium</a>
                    </td>
                    <td>IoT</td>
                    <td>06 June 2021</td>
                </tr>
                <tr>
                    <td>
                        <a href="/iot/smart-bed">Stunt Detector</a>
                    </td>
                    <td>IoT</td>
                    <td>06 June 2021</td>
                </tr>
            </tbody>
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
