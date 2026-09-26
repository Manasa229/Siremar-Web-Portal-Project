import { Component } from 'react';
import "./dashboard.css"
import Navbar from '../Navbar/Navbar';
import Sidebar from "../Sidebar/Sidebar.js";
import Footer from '../Footer/Footer';
import Graph from '../../components/Table/Graph';


class dashboard extends Component {

    render() {
        return (
            <div class="layer">
                <div class="flex-container">
                    <Sidebar />
                    <div class="main-wrapper">
                        <Navbar />
                        <main class="main users chart-page" id="skip-target">
                            <div class="container">
                                <h2 class="main-title">Dashboard</h2>
                                <div class="flex-row stat-cards">
                                    <div class="col-md-6 col-xl-3">
                                        <article class="stat-cards-item">
                                            <div class="stat-cards-icon primary">
                                                <i data-feather="bar-chart-2" aria-hidden="true"></i>
                                            </div>
                                            <div class="stat-cards-info">
                                                <p class="stat-cards-info__num">Schools</p>
                                                <p class="stat-cards-info__title">Total residents registered</p>
                                                <p class="stat-cards-info__progress">
                                                    <span class="stat-cards-info__profit success">
                                                        <i data-feather="trending-up" aria-hidden="true"></i>4.07%
                                                    </span>
                                                    Last month
                                                </p>
                                            </div>
                                        </article>
                                    </div>
                                    <div class="col-md-6 col-xl-3">
                                        <article class="stat-cards-item">
                                            <div class="stat-cards-icon warning">
                                                <i data-feather="file" aria-hidden="true"></i>
                                            </div>
                                            <div class="stat-cards-info">
                                                <p class="stat-cards-info__num">Business</p>
                                                <p class="stat-cards-info__title">Total residents registered</p>
                                                <p class="stat-cards-info__progress">
                                                    <span class="stat-cards-info__profit success">
                                                        <i data-feather="trending-up" aria-hidden="true"></i>0.24%
                                                    </span>
                                                    Last month
                                                </p>
                                            </div>
                                        </article>
                                    </div>
                                    <div class="col-md-6 col-xl-3">
                                        <article class="stat-cards-item">
                                            <div class="stat-cards-icon purple">
                                                <i data-feather="file" aria-hidden="true"></i>
                                            </div>
                                            <div class="stat-cards-info">
                                                <p class="stat-cards-info__num">Flights</p>
                                                <p class="stat-cards-info__title">Total residents availed</p>
                                                <p class="stat-cards-info__progress">
                                                    <span class="stat-cards-info__profit danger">
                                                        <i data-feather="trending-down" aria-hidden="true"></i>1.64%
                                                    </span>
                                                    Last month
                                                </p>
                                            </div>
                                        </article>
                                    </div>
                                    <div class="col-md-6 col-xl-3">
                                        <article class="stat-cards-item">
                                            <div class="stat-cards-icon success">
                                                <i data-feather="feather" aria-hidden="true"></i>
                                            </div>
                                            <div class="stat-cards-info">
                                                <p class="stat-cards-info__num">Fairy</p>
                                                <p class="stat-cards-info__title">Total residents availed</p>
                                                <p class="stat-cards-info__progress">
                                                    <span class="stat-cards-info__profit warning">
                                                        <i data-feather="trending-up" aria-hidden="true"></i>0.00%
                                                    </span>
                                                    Last month
                                                </p>
                                            </div>
                                        </article>
                                    </div>
                                </div>
                                <div class="flex-row">
                                    <div class="dashboard-graph">
                                        <Graph />
                                    </div>
                                    <div class="col-md-6 col-xl-3">
                                        <article class="stat-cards-item">
                                            <div class="stat-cards-icon success">
                                                <i data-feather="feather" aria-hidden="true"></i>
                                            </div>
                                            <div class="stat-cards-info">
                                                <p class="stat-cards-info__num">Events</p>
                                                <p class="stat-cards-info__title">Total residents availed</p>
                                                <p class="stat-cards-info__progress">
                                                    <span class="stat-cards-info__profit warning">
                                                        <i data-feather="trending-up" aria-hidden="true"></i>0.00%
                                                    </span>
                                                    Last month
                                                </p>
                                            </div>
                                        </article>
                                    </div>
                                    <div class="col-md-6 col-xl-3">
                                        <article class="stat-cards-item">
                                            <div class="stat-cards-icon success">
                                                <i data-feather="feather" aria-hidden="true"></i>
                                            </div>
                                            <div class="stat-cards-info">
                                                <p class="stat-cards-info__num">Moving Outs</p>
                                                <p class="stat-cards-info__title">Total residents moved out</p>
                                                <p class="stat-cards-info__progress">
                                                    <span class="stat-cards-info__profit warning">
                                                        <i data-feather="trending-up" aria-hidden="true"></i>0.00%
                                                    </span>
                                                    Last month
                                                </p>
                                            </div>
                                        </article>
                                    </div>
                                </div>
                                <Footer />
                            </div>
                        </main>
                    </div>
                </div>
            </div>
        );
    }
}
export default dashboard;  