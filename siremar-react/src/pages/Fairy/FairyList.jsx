import { useNavigate } from 'react-router';
import "../County/CountyList.css"
import Sidebar from '../Sidebar/Sidebar.js';
import Navbar from '../Navbar/Navbar';
import Footer from '../Footer/Footer';
import Table from '../../components/Table/Table';

function FairyList() {

    const navigate = useNavigate();
    const sampleFairys = [{
        "Name": "Fairy 1",
        "Date": "09/03/2022",
        "Phone Number": "8163536904",
        "Address": "1001 UTA blvd, campus edge, apt 416C",
        "Discounts/Benefits": "20% discount on purchase of two tickets"
    }, {
        "Name": "Fairy 2",
        "Date": "09/04/2022",
        "Phone Number": "6823139953",
        "Address": "1001 UTA blvd, campus edge, apt 416C",
        "Discounts/Benefits": "free food and drink available"

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
                                <h1 class="page-title">Fairies</h1>
                                <button class="button" onClick={() => navigate("/new/fairy")}>Add New Fairy</button>
                            </div>
                            <div class="page-card">
                                <Table dataList={sampleFairys} />
                            </div>
                            <Footer />
                        </div>
                    </main>
                </div>
            </div>
        </div>
    );
}


export default FairyList;

