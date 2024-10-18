<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
      <li class="nav-item">
        <a class="nav-link" href="{{url('/dashboard')}}">
          <i class="mdi mdi-home menu-icon"></i>
          <span class="menu-title">Dashboard</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#category" aria-expanded="false" aria-controls="ui-basic">
            <i class="mdi mdi-format-list-bulleted menu-icon"></i>
          <span class="menu-title">Category</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="category">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{ route('category.create') }}">Add Category</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{ route('category.index') }}">All Category</a></li>
          </ul>
        </div>
      </li>
      {{-- <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#question" aria-expanded="false" aria-controls="ui-basic">
          <i class="mdi mdi-circle-outline menu-icon"></i>
          <span class="menu-title">Question Types</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="question">
          <ul class="nav flex-column sub-menu">

          </ul>
        </div>
      </li> --}}
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#question" aria-expanded="false" aria-controls="ui-basic">
            <i class="mdi mdi-help-circle-outline menu-icon"></i>
          <span class="menu-title">Question</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="question">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{ route('type.create') }}">Add Question type</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{ route('type.index') }}">All Question type</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{ route('question.create') }}">Add Question</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{ route('question.index') }}">All Question</a></li>
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#package" aria-expanded="false" aria-controls="ui-basic">
            <i class="mdi mdi-view-carousel menu-icon"></i>
          <span class="menu-title">Package</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="package">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{ route('package.create') }}">Add Package</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{ route('package.index') }}">All Packages</a></li>
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#slider" aria-expanded="false" aria-controls="ui-basic">
            <i class="mdi mdi-view-carousel menu-icon"></i>
          <span class="menu-title">Slider</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="slider">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{ route('slider.create') }}">Add Slider</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{ route('slider.index') }}">All Slider</a></li>
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#pages" aria-expanded="false" aria-controls="ui-basic">
            <i class="mdi mdi-file-document-outline menu-icon"></i>
          <span class="menu-title">Pages</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="pages">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{ route('pages.create') }}">Add Page</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{ route('pages.index') }}">All Pages</a></li>
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#contact" aria-expanded="false" aria-controls="ui-basic">
            <i class="mdi mdi-file-document-outline menu-icon"></i>
          <span class="menu-title">Contact</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="contact">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{ route('allContacts') }}">All Contacts</a></li>
          </ul>
        </div>
      </li>





    </ul>
  </nav>
