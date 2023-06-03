@extends('user-panel.master')

@section('css')
    <link rel="stylesheet" href="{{ asset('cp/assets/css/enjoyhint.css') }}">
    <style>
        .apexcharts-text tspan{
            font-family: 'Vazir' !important;
        }
        .position-float{
            position:fixed;
            bottom: 2rem;
            right:3rem;
        }
        .btn-floating{
            background-color: #0f90c6;
            width: 70px;
            height: 70px;
            border-radius: 50%;
            box-shadow: 0 2px 10px #15697c;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        #shiny-shadow button {
            border: 2px solid white;
            text-transform: uppercase;
            color: white;
            outline: none;
            overflow: hidden;
            position: relative;
        }

        #shiny-shadow span {
            z-index: 20;
        }

        #shiny-shadow button:after {
            content: '';
            display: block;
            position: absolute;
            top: -36px;
            left: -100px;
            background: white;
            width: 50px;
            height: 140px;
            opacity: 35%;
            transform: rotate(-45deg);
            animation: shining-btn 3s infinite;
        }
        @keyframes shining-btn {
            8%{
                display: block;
                left: 122%;
                transition: all 600ms cubic-bezier(0.3, 1, 0.2, 1);
                -webkit-transition: all 600ms cubic-bezier(0.3, 1, 0.2, 1);
            }
            35%{
                left: -100px;
            }
        }
    </style>
@stop
@section('content')
    @include('user-panel.include.content')
@endsection
@section('js')
    {{--<script src="https://cdnjs.cloudflare.com/ajax/libs/kineticjs/5.2.0/kinetic.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-scrollTo/2.1.2/jquery.scrollTo.min.js"></script>
    <script src="{{ asset('cp/assets/js/enjoyhint.min.js') }}"></script>
    <script>
        $(document).ready(function (){
            var enjoyhint_instance = new EnjoyHint({});

            var enjoyhint_script_steps = [
                {
                    'click .e-hint' : 'از این جا شروع کن',
                    'skipButton' : {text: "فهمیدم"}
                }
            ];

            enjoyhint_instance.set(enjoyhint_script_steps);

            enjoyhint_instance.run();
        })
    </script>--}}
@stop