<!DOCTYPE html>
<html lang="en">
<head>
    <title>Recettes</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/theme-light.css') }}">
    <link rel="stylesheet" href="{{ asset('css/theme-dark.css') }}">

    <style>
        a {
            text-decoration: none;
        }
    </style>

    <link rel="icon" type="image/png" sizes="32x32" href="data:image;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAA3CAIAAADBkI5VAAAAA3NCSVQICAjb4U/gAAAAEHRFWHRTb2Z0d2FyZQBTaHV0dGVyY4LQCQAABUtJREFUaAXtmW1MG2UcwO+udQ7YltKCqMhgMJXwsgwhbnOBjA84F9lGTLYF0cwXtix+YH5yfkCNftA4wwdNEI3JMrJlksV9mYNpQJQlOkCnzqyj14NWNkrreOldSym0d/d413LX57ley7WMhQ+9L/f8n/u//J7//3kr4AAAbO09xNpDEolSWInUJZWtRLKlV1H2U9+3fzOwUHn05OHyjTiGBezdX3T0z5U1vf3qMwZBZif62tuvup860vLas0ZB1vpwXvtw74/9g2Zn0LC1+tDRhm2ZsYoVjQW8g12dv5j92OjlmgPlNWkYe7una8A8C6yXrtdX7DPinK334k//ODhzZ8+eyle26DRQAZ/92sXO8903nH4+vB/ZqREn8fknDbnqYNFYnG2EWhRteTbIiSEXZ2fmeFF2z9A8ZtSBIMuGvk+SpAdsyVwmX8BjvtR2+tyN6ZCR6DD0AL9l+G/6YK56uqNgeRdpZUQK6QEeOiwDj5uBt17AjlnGgpKa+hvMDne823r2DwVTWDmwuKhuFb1vgXmKvBtKkmTBe2hPCBP4GAah4OcoiwPRlWyW3v6Rcx9+2jMegAejUIkhKrPF2SyjqBsRK+QXyC3JFz9JWr2xYgL6esdn340txPouOVF9K7B4l9UqTCDoAQu0JzTVMAwwbqS8GGBtscoIvENnvvr5Py4pqKgi+kfJO2hZAMNIMwowS3mTqXkvRaqWkRvv/nZgBhmfbKSlgWZLGD2FlhDjhYm+5J5fYGg/OnzeQVJzaJcYlbX09trQlacFJqKDYPH3rFa3Yoi8h5GnT3S6ADtqGWMj7sItlhocuqfwo9SJLyNYfsqiKCEG5mkmKKUDypzkVViNpENBwLvMt6YUfZK+xjeMxdoto0uzW7ZGEgQ8THivkD9jGDdBUnI6w/2B8TF0j4HUNTYhLDBltc7CgwQ8EDcFaWoJSzFI0z6ACf0R70IZSRuySvhpp0tOcEQxoRZ0+HCTdydhKu721bNd/7p+hRYUO3LlzAWnd3AG4uK9jgk3qMiWzyCeFg+plT0QFggEkEHyPvKH8yTiHizY+y/YkS5BCARFOxkL+H3zELZSW5MMFZEwZhkhUZO5oITrjSYDYseySFG1OoL0OMifLr+keAMkQ2pxmri+qPTptDgKSX2CMdZX7K19FO7Q4BFPr3i+JkcuoAYLTSoIxbqSQ2/WPqLTHoTIKGt8fY/6lUlT+FhKCBaGG3a+9d6xKpMmMiJ964FTpxo2Q6smVpSE+1EswXx94f7Wtg+adjz2cJyk4XpD8YsnT3/cXLnc3TRhoLCB2lD12ZWN739dP/7Xb0M3h/quDDsipzeRWVr3QnVF1a4dxVnrkgypxUwNK2Sn25hftTd/e5az73cYK6+6sWl/ZOvUEiIZnagiJuPk/tusBhahW7HXFTuIzpQu5/EcLT8eoy0jPauAReTt3JWnj7OOI9FjtlYBC9MVHGzel/vQCsBWPgvUBoxnbG/+6J36JzcQyaLF3CDUwiXQp8957kRbWd1g/7U/rY4ZX0C4OQLvnVvUVGQPjOdttbDEmLpNRbsbinZL4dmbX77R2g3fIKUv0e/VmFvRURLuSWElkrJUtlLZSiQDieim5tb9zBZOIPkUxOTvLATqC1PKEDcSFOpfauryCgugqwBhKijYlOzxq8stzId+txCZBbH/eL4MFp5dd/x49RNpwlUA12eWH245UpL0KYoba4+dqN2cHvJlKH2p5eVtMX+l4Fr+zQkWmSmayzAZM5JmkgsBAp5pdzDdZIrrSxOW7POBNZYp4gPjUARKYSkSEldco9n6H9SdMMzjwY/iAAAAAElFTkSuQmCC">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body class="theme-light">
    <div>
        <nav class="navbar py-4" role="navigation" aria-label="main navigation" style="background-color:rgb(230, 186, 65);">
            <div class="container">
              <div class="navbar-brand">
                <a class="navbar-item" href="/">
                  <span class="icon">
                    <i class="fas fa-utensils" style="font-size:26px; width:26px"></i>
                  </span>
                </a>

                <a id="navbarBurger" class="navbar-burger" role="button" aria-label="menu" aria-expanded="false" data-target="navbarMenu">
                  <span aria-hidden="true"></span>
                  <span aria-hidden="true"></span>
                  <span aria-hidden="true"></span>
                </a>
              </div>
              <div id="navbarMenu" class="navbar-menu">
                <div class="navbar-start">
                  <a class="navbar-item" href="/">Accueil</a>
                  <a class="navbar-item" href="/recipe">Recette</a>
                  <a class="navbar-item" href="/contact">Contacte</a>
                  <a class="navbar-item" href="/phpliteadmin.php">DBADMIN</a>
                </div>
                <div class="navbar-end">
                  <div class="navbar-item">
                    <form action="{{url('/recipes/search')}}" method="GET" class="field has-addons">
                      <div class="control">
                        <input class="input" type="search" name="tags" placeholder="Recherche" aria-label="Search">
                      </div>
                      <div class="control">
                        <button class="button" type="submit">
                          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" style="width: 24px;height: 24px">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                          </svg>
                        </button>
                      </div>
                    </form>
                  </div>
                  <div class="navbar-item">
                    <a href="{{ route('login') }}" class="button">
                      <i class="fa fa-user"></i>
                    </a>
                  </div>
                  <div class="navbar-item">
                    <a href="#" id="theme-toggle" class="navbar-item">
                      <i class="fas fa-adjust"></i>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </nav>


        <section class="section">
            <div class="container">
                @yield('content')
            </div>
        </section>
    </div>

    <script src="{{ asset('js/theme-toggle.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/bulma@0.9.3/js/bulma.min.js"></script> --}}


</body>

<footer style="background-color:rgb(221, 219, 214); padding: 30px; ">

    <div class="container">
        <div class="text-center">
            <div class="row">
            <div class="col">
                {{-- <a href=""><h3 style="color: #7e0404; font-size: 24px; font-weight: bold;">Rencontrez notre équipe</h3>
                    <i class="fas fa-users" style="color: #7e0404;"></i>
                </a>
                <br> --}}
                <h3 style="color: #333; font-size: 24px; font-weight: bold;">Suivez-nous sur les réseaux sociaux </h3>
                <ul class="social-media-icons" style="list-style: none; padding: 0;">
                    <li style="display: inline-block; margin-right: 10px;">
                        <a href="https://www.facebook.com" style="color: #333; text-decoration: none; font-size: 20px;">
                            <i class="fab fa-facebook"></i>
                        </a>
                    </li>
                    <li style="display: inline-block; margin-right: 10px;">
                        <a href="https://twitter.com" style="color: #333; text-decoration: none; font-size: 20px;">
                            <i class="fab fa-twitter"></i>
                        </a>
                    </li>
                    <li style="display: inline-block;">
                        <a href="https://instagram.com" style="color: #333; text-decoration: none; font-size: 20px;">
                            <i class="fab fa-instagram"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    </div>
</footer>



</html>
