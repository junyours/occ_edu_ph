import WebLayout from "@/layouts/web-layout";
import { ReactPortal } from "react";
import Hero from "./sections/hero";
import Feature from "./sections/feature";
import VisionMission from "./sections/vision-mission";
import VisitUs from "./sections/visit-us";
import News from "./sections/news";

export default function Home() {
    return (
        <div className="space-y-10 md:space-y-20">
            <Hero />
            <Feature />
            <VisionMission />
            <News />
            <VisitUs />
        </div>
    );
}

Home.layout = (page: ReactPortal) => <WebLayout children={page} />;
