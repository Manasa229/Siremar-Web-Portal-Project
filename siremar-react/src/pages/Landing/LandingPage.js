import { Component } from 'react';
import './LandingPage.css';

import video from "../../images/margarita.ogv"
import video2 from "../../images/margarita.mp4"
import video3 from "../../images/margarita.webm"
import MainNavBar from '../Navbar/MainNavBar';
import HomePage from '../Home/HomePage';
const sec = "#t=12,160";

class LandingPage extends Component {
    render() {
        return (
            <div class="landing-page-container">
                <MainNavBar />
                <div class="video-container">
                    <video autoPlay muted loop class="myVideo">
                        <source src={video + sec} type="video/ogv" />
                        <source src={video2 + sec} type="video/mp4" />
                        <source src={video3 + sec} type="video/webm" />
                        Your browser does not support HTML5 video.
                    </video>
                </div>

                <section id="home" class="home-section ">
                    <HomePage />
                </section>

                <section id="about" class="feature-section p-10 md-p-l5 video-container-parallax">
                    <div class="about-container  ">

                        <span class="about">About 25 miles from the mainland and accessible by plane or ferry, Venezuela's mountainous Margarita Island offers Caribbean-style beaches and a laid-back South American vibe for windsurfing, golf, horseback riding and scuba diving.</span>
                        <br></br>
                        <span class="about">

                            The Island has Places to see, ways to wander, and signature experiences which you have never experienced; A mix of the charming, modern, and world class and also, Can't-miss spots to dine, drink, and feast.
                        </span>
                        <br></br>
                        <br></br>
                        <br></br>
                        <span class="about-siremar">
                            Siremar is a Leading Edge Web Portal which Aims to keep a Dynamic count of all residents and provide all the necessary information to the residents of the beautiful island of Margarita located in South America.
                        </span>
                    </div>
                </section>

                <section id="services" class="service-section">
                    <div class="service-container   ">
                        <div class="service-content-school">
                            <div class="service-padding ">
                                <div class="    "><i
                                    data-feather="inbox" class=""></i></div>
                                <h4 class="service-heading">Schools</h4>
                                <div class="service-explanation">Users can register for the schools and get top priority for selection based on if they are Residents of the Margarita Island. Other services related to Schools also available.</div>
                                {/* <a href="#"
                                    class="button">Read</a> */}
                            </div>
                        </div>
                        <div class="service-content-idcard">
                            <div class="service-padding ">
                                <div class=""><i
                                    data-feather="cpu" class=""></i></div>

                                <h4 class=" service-heading  ">Identification Card</h4>
                                <div class=" service-explanation  ">Users are entitled to get an Identification card if they are valid Residents of the Island of Margarita. This ID can then be used to avail other services offered to the residents.</div>
                                {/* <a href="#"
                                    class="button      ">Read</a> */}
                            </div>
                        </div>
                        <div class="service-content-flights ">
                            <div class="">
                                <div class="    "><i
                                    data-feather="database" class=""></i></div>
                                <h4 class=" service-heading  ">Flights</h4>
                                <div class="  service-explanation ">Users have access to all available flights to their destinations of choice and also view and avail any discounts offered specially to the residents of Margarita Island.</div>
                                {/* <a href="#"
                                    class="button      ">Read</a> */}
                            </div>
                        </div>
                    </div>
                    <div class="service-container-row2">
                        <div class=" service-content-ferry">
                            <div class="">
                                <h4 class="  service-heading  ">Ferry</h4>
                                <div class="   service-explanation ">Users have access to all available Ferry’s to their destinations of choice and also view and avail any discounts offered specially to the residents of Margarita Island.</div>
                                {/* <a href="#"
                                class="button      ">Read</a> */}
                            </div>
                        </div>
                        <div class="service-content-business ">
                            <div class="">
                                <h4 class=" service-heading   ">Business</h4>
                                <div class="  service-explanation  ">Users can view business which are available to purchase or work with and can also avail benefits while taking up the businesses as Residents of the Margarita Island.</div>
                                {/* <a href="#"
                                class="button      ">Read</a> */}
                            </div>
                        </div>
                        <div class="service-content-events">
                            <div class="">
                                <h4 class=" service-heading   ">Events</h4>
                                <div class="  service-explanation  ">Users can get a great perspective of the Margarita Island by viewing all the event’s and Residents enjoy special discounts and offers.</div>
                                {/* <a href="#"
                                class="button      ">Read</a> */}
                            </div>
                        </div>
                    </div>
                </section>

                <section id="login" class="getting-started-section ">
                    <div class=" getting-started-content">
                        <div class=" ">
                            <div class="">
                                <h1>Getting Started</h1>
                                <h4 class="getting-started">You are Steps away from making your Life Easier at the Island</h4>

                            </div>
                        </div>
                        <div class=" card  ">
                            <div class="">
                                <div class="">
                                    <h3 class="">Register?</h3>

                                </div>

                                <div class="register-link">
                                    {/* <a href="/register" >Click to register</a> */}
                                </div>
                            </div>
                        </div>
                        <div class="white-card">
                            <div class=" m-3   ">
                                <h3 class="">Login?</h3>
                                <div class="login-link">
                                {/* <a href="/login" >Click to login</a> */}

                                </div>
                                <div class=" black fw-400  lh-5">
                                    <div>
                                        <i class="h-3 " stroke-width="4" data-feather="check"></i>
                                        <span class=""> </span></div>
                                    <div>
                                        <i class="h-3 " stroke-width="4" data-feather="check"></i>
                                        <span class=""></span></div>
                                    <div>
                                        <i class="h-3 " stroke-width="4" data-feather="check"></i>
                                        <span class=""></span></div>
                                    <div>
                                        <i class="h-3 " stroke-width="4" data-feather="check"></i>
                                        <span class=""></span></div>
                                    <div>
                                        <i class="h-3 " stroke-width="4" data-feather="check"></i>
                                        <span class=""></span></div>
                                </div>
                                <div class="">
                                    {/* <button class="button bg-   ">Login</button> */}
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        )
    }
}
export default LandingPage;