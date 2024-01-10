<html>

<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&family=Marck+Script&family=Merriweather:wght@700&family=Source+Sans+Pro:ital,wght@0,400;0,700;1,400;1,700&display=swap"
        rel="stylesheet">
    <style>
        *,
        html,
        body {
            margin: 0;
            padding: 0;
            font-family: "Source Sans Pro", sans-serif;
        }

        .container {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            height: 100vh;
        }

        #certificate {
            background-color: #f9fafa;
            background: url("https://iili.io/HXshqkN.png");
            border: 1px solid #dedede;
            width: 1280px;
            height: 800px;
            position: relative;
        }

        .cert {
            color: #3e0e0e;
            background-color: #fff;
            background-image: url("https://iili.io/HXshBpI.jpg");
            background-position: right bottom;
            background-size: cover;
            background-repeat: no-repeat;
            border: 2px solid #ddd;
            margin: 2em;
            padding: 2em;
            position: absolute;
            left: 0;
            right: 0;
            top: 0;
            bottom: 0;
        }

        .cert-logo {
            display: flex;
            justify-content: start;
            // justify-content: center;
            align-items: center;

            img {
                width: 40px;
            }

            &-name {
                font-weight: bold;
                margin-left: 0.5em;
                text-align: left;
                text-transform: uppercase;
            }
        }

        .cert-header {
            text-align: center;

            .cert-title {
                font-family: "Merriweather", serif;
                font-size: 2em;
                font-weight: normal;
                text-transform: uppercase;
                margin-top: 1em;
            }

            .cert-no {
                margin-top: 0.5em;
                letter-spacing: 0.1em;
                text-transform: uppercase;
            }
        }

        .cert-content {
            text-align: center;
            margin: 3em 0;

            .cert-label {
                font-size: 0.9em;
                text-transform: uppercase;
            }

            .cert-user {
                &-name {
                    color: #125096;
                    font-family: "Marck Script", cursive;
                    font-size: 3em;
                    margin: 0.5em 0 0.05em;
                }

                &-info {}
            }

            .cert-achievement {
                font-size: 1.1em;
                font-weight: semi-bold;
                margin-top: 2em;
            }

            .cert-signature {
                margin-top: 4em;

                &-sign {
                    height: 6em;
                }
            }
        }

        .cert-footer {
            left: 2em;
            right: 2em;
            bottom: 2em;
            position: absolute;
            text-align: left;
        }

        .cert-qr {
            &-image img {
                width: 78px;
                height: 78px;
            }

            &-label {
                color: #999;
                font-size: 0.8em;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <div id="certificate">
            <div class="cert">
                <div class="cert-header">

                    <div class="cert-logo">
                        <img src="{{ asset('storage/images/logo.png') }}" />
                        <div class="cert-logo-name">e-learning</div>
                    </div>

                    <div class="cert-title">CERTIFICAT</div>
                    <div class="cert-no">2008/B3/GT.06.03/2023</div>
                </div>

                <div class="cert-content">
                    <div class="cert-label">CE CERTIFICAT EST ADRESSÉ À</div>
                    <div class="cert-user">
                        <div class="cert-user-name">{{$user['FirstName']}} {{$user['LastName']}}</div>
                        <div class="cert-user-info">IP {{$user['id_U']}}</div>
                    </div>
                    <div class="cert-achievement">avoir réussi avec succès l'examen de certification pour le module Cree le 16 mars 2023."</div>

                    <div class="cert-signature">
                        <div>E-Learning, {{ date('Y-m-d') }}</div>
                        <div class="cert-signature-sign"></div>
                        <!-- <div style="font-weight: bold;">Prof. Dr. (H.C.) Ir. Raihan Prasetyo</div> -->
                        <div>Directeur président</div>
                    </div>
                </div>

                <div class="cert-footer">
                    <div class="cert-qr">
                        <div class="cert-qr-image">
                            <!-- <img src="https://iili.io/HXsjUx9.md.png" /> -->
                        </div>
                    </div>
                    <div class="cert-qr-label">Vérifiez l'authenticité de ce certificat en scannant le code ci-dessus</div>
                </div>
            </div>
        </div>

        {{-- <ul style="display: none;">
            <li>Convert SCSS to CSS, https://jsonformatter.org/scss-to-css</li>
            <li>Copy HTML to https://templates.mailchimp.com/resources/inline-css/ and add the CSS converted earlier
            </li>
        </ul> --}}
</body>

</html>