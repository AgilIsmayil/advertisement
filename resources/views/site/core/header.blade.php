   <section class="container">
      <header
        class="flex-column align-content-between align-content-md-stretch flex-md-row h-auto"
      >
        <ul class="links">
          <li>
            <a href="https://tap.az">Tap.az</a>
          </li>
          <li>
            <a href="https://bina.az">Bina.az</a>
          </li>
          <li>
            <a href="https://boss.az">Boss.az</a>
          </li>
        </ul>
        <ul class="header-menu">
          <li>
            <span>Dəstək</span>
            <span>
              <a href="tel:(012) 505-77-55">(012) 505-77-55</a>
            </span>
          </li>
          <li>
            <a href="/help">Yardım</a>
          </li>
          <li>
            <a href="#">AZ</a>
          </li>
          <li>
            <a href="/bookmarks.html">Seçilmişlər</a>
          </li>
        @if(!auth()->guard('site')->check())
            <li>
            <a href="{{ route('register') }}" class="mainLoginIcon">
              <span class="loginIconDesign">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                  <path
                    d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z"
                  />
                </svg>
              </span>

              <span>Qeydiyyat</span>
            </a>
          </li>
          <li>
            <a href="{{ route('login') }}" class="mainLoginIcon">
              <span class="loginIconDesign">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                  <path
                    d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z"
                  />
                </svg>
              </span>

              <span>Giris</span>
            </a>
          </li>
          @else
           <li>
            <a href="#" class="mainLoginIcon">
              <span class="loginIconDesign">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                  <path
                    d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z"
                  />
                </svg>
              </span>

              <span>{{auth()->guard('site')->user()->name}}</span>
            </a>
          </li>
           <li>
            <a href="{{ route('logout') }}" class="mainLoginIcon">
               <i class="fa-solid fa-right-from-bracket"></i>

              <span>Log out</span>
            </a>
          </li>
        @endif
        </ul>
      </header>