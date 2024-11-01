<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="active">
                    <a href="/dashboard"
                    ><i class="fas fa-tachometer-alt"></i>
                        <span>Dashboard</span></a
                    >
                </li>
                <li class="list-divider"></li>
                <li class="submenu">
                    <a href="#"
                    ><i class="fas fa-edit"></i> <span> Articles </span>
                        <span class="menu-arrow"></span
                        ></a>
                    <ul class="submenu_class" style="display: none">
                        <li><a href="{{ route('article.index') }}"> Tous les articles </a></li>
                        <li><a href="{{ route('article.create') }}"> Ajouter un article </a></li>
                    </ul>
                </li>

                <li>
                    <a href="{{ route('comment.index') }}"
                    ><i class="fe fe-table"></i> <span>Commentaires</span></a
                    >
                </li>

                @can('admin-access')
                    <li class="submenu">
                        <a href="#"
                        ><i class="fas fa-book"></i> <span> Catégories </span>
                            <span class="menu-arrow"></span
                            ></a>
                        <ul class="submenu_class" style="display: none">
                            <li>
                                <a href="{{ route('category.index') }}"> Tous les catégories </a>
                            </li>

                            <li>
                                <a href="{{ route('category.create') }}"> Ajouter une catégorie </a>
                            </li>
                        </ul>
                    </li>

                    <li class="submenu">
                        <a href="#"
                        ><i class="fas fa-user"></i> <span> Auteurs </span>
                            <span class="menu-arrow"></span
                            ></a>
                        <ul class="submenu_class" style="display: none">
                            <li><a href="{{ route('author.index') }}">Tous les auteurs </a></li>
                            <li>
                                <a href="{{ route('author.create') }}"> Ajouter un auteur </a>
                            </li>
                        </ul>
                    </li>

                    <li class="submenu">
                        <a href="#"
                        ><i class="far fa-money-bill-alt"></i>
                            <span> Medias Sociaux </span> <span class="menu-arrow"></span
                            ></a>
                        <ul class="submenu_class" style="display: none">
                            <li><a href="{{ route('social.index') }}">Tous les medias </a></li>
                            <li><a href="{{ route('social.create') }}">Ajouter un media </a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="{{ route('contact.index') }}"
                        ><i class="fe fe-table"></i> <span>Contacts</span></a
                        >
                    </li>

                    <li>
                        <a href="{{ route('setting.index') }}"
                        ><i class="fas fa-cog"></i> <span>Paramètres</span></a
                        >
                    </li>
                @endcan


            </ul>
        </div>
    </div>
</div>
