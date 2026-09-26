import { Component } from 'react';
import "./MainNavBar.css"

class MainNavBar extends Component {
    render() {
        return (
            <nav class="navbar md-px-10">
                <div class="navbar-content">
                    <a href="#" class="p-2 mr-4 ">
                    </a>
                    <a data-toggle="toggle-nav" data-target="#nav-items" href="#"
                        class="  ml-auto md-hidden -lighter    p-1 m-3">
                        <i data-feather="menu"></i>
                    </a>
                </div>
                <div id="nav-items" class="navbar-menu hidden  sm- md-  md-justify-end ">
                    <a href="/#home" class="navbar-menu-item">Home</a>
                    <a href="/#about" class="navbar-menu-item">About</a>
                    <a href="#services" class="navbar-menu-item">Services</a>
                    <a href="#blog" class="navbar-menu-item">Blog</a>
                    <a href="#contact" class="navbar-menu-item">Contact</a>
                    <a href="/login" class="navbar-menu-item">Login</a>
                    <a href="/register" class="primary-default-button">Register</a>
                </div>
            </nav>
        )
    }
}

export default MainNavBar;