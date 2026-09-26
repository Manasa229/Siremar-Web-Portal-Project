import { Component } from 'react';
import "../County/CountyList.css"
import Sidebar from '../Sidebar/Sidebar.js';
import Navbar from '../Navbar/Navbar';
import Footer from '../Footer/Footer';

class Fairy extends Component {

    render() {
        return (
            <div class="layer">
                <div class="flex-container">
                    <Sidebar />
                    <div class="main-wrapper">
                        <Navbar />
                        <h1 class="page-title">New Fairy</h1>
                        <div class="form-section">
                            <div class="form-save-card">

                                <form class="register-form" action="" method="">
                                    <div class="flex-row">
                                        <label class="register-form-label-wrapper">
                                            <p class="register-form-label">Name</p>
                                            <input class="form-input" type="text" placeholder="Enter fairy name" required />
                                        </label>
                                        <label class="register-form-label-wrapper">
                                            <p class="register-form-label">Date</p>
                                            <input class="form-input" type="date" placeholder="Enter the date" required />
                                        </label>
                                        <label class="register-form-label-wrapper">
                                            <p class="register-form-label">Time</p>
                                            <input class="form-input" type="time" placeholder="Enter the time " required />
                                        </label>


                                        <label class="register-form-label-wrapper">
                                            <p class="register-form-label">Street 1</p>
                                            <input class="form-input" type="text" placeholder="Enter street 1" required />
                                        </label>
                                        <label class="register-form-label-wrapper">
                                            <p class="register-form-label">Street 2</p>
                                            <input class="form-input" type="text" placeholder="Enter street 2" required />
                                        </label>

                                        <label class="register-form-label-wrapper">
                                            <p class="register-form-label">Pincode</p>
                                            <input class="form-input" type="number" placeholder="Enter the pincode" required />
                                        </label>
                                        <label class="register-form-label-wrapper">
                                            <p class="register-form-label">Discount on ticket</p>
                                            <input class="form-input" type="number" placeholder="Enter the discount" required />
                                        </label>
                                    </div>

                                    <div class="save-button">
                                        <button class="save-form-btn primary-default-button ">Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <Footer />
                    </div>
                </div>
            </div>
        );
    }
}

export default Fairy;

