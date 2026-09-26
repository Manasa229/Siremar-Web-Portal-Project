// Developed by Nishank Gujar

import { Component } from 'react';
import './Login.css'
import MainFooter from '../Footer/MainFooter';
import MainNavBar from '../Navbar/MainNavBar';
import video2 from "../../images/margarita.mp4"
import video from "../../images/margarita.ogv"
import video3 from "../../images/margarita.webm";

import React from "react";
const sec = "#t=12,160";
class Login extends Component {
    render() {
        return (
            <div class="login-container flex-column">
                <MainNavBar />
                <div class="video-container">
                    <video autoPlay muted loop class="login-video">
                        <source src={video + sec} type="video/ogv" />
                        <source src={video2 + sec} type="video/mp4" />
                        <source src={video3 + sec} type="video/webm" />
                        Your browser does not support HTML5 video.
                    </video>
                </div>
                <div class="login-card">
                    <div class="login-form">
                        <h1 class="login-title">Login</h1>
                        <form class="sign-up-form form" action="" method="">
                            <label class="form-label-wrapper">
                                <p class="form-label">Email</p>
                                <input class="form-input" type="email" placeholder="Enter your email" required />
                            </label>
                            <label class="form-label-wrapper">
                                <p class="form-label">Password</p>
                                <input class="form-input" type="password" placeholder="Enter your password" required />
                            </label>


                            <button class="login-btn primary-default-button">Sign in</button>
                        </form>
                    </div>
                </div>
                <MainFooter />
            </div>

        );

    }
}

export default Login;