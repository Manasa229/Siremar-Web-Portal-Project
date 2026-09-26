import { Component } from 'react';
import "../County/CountyList.css"
import Sidebar from '../Sidebar/Sidebar.js';
import Navbar from '../Navbar/Navbar';
import Footer from '../Footer/Footer';
import Table from '../../components/Table/Table';

class BusinessList extends Component {

    render() {
        const sampleBusinesss = [{
            "Name": "Business 1",
            "Type": "Bank",
            "Phone Number": "8163536904",
            "Address": "1001 UTA blvd, campus edge, apt 416C",
            "Discounts/Benfitis":"free insurance for 5 years"
        }, {
            "Name": "Business 2",
            "Type": "Housing",
            "Phone Number": "6823139953",
            "Address": "1001 UTA blvd, campus edge, apt 416C",
            "Discounts/Benfitis":"claim the property damages investment upto 8000usd"

        }]
        return (
            <div class="layer">
                <div class="flex-container">
                    <Sidebar />
                    <div class="main-wrapper">
                        <Navbar />
                        <main class="main users chart-page" id="skip-target">
                            <div class="page-container">
                                <div class="flex-column">
                                    <h1 class="page-title">Businesss</h1>
                                    <button class="button">Add New Business</button>
                                </div>
                                <div class="page-card">
                                    <Table dataList={sampleBusinesss} />
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

export default BusinessList;

