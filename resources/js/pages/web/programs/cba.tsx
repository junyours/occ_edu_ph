import WebLayout from "@/layouts/web-layout";
import { ReactPortal } from "react";
import Department from "../../../../../public/images/departments/CBA.png";

export default function CBA() {
    return (
        <>
            <div className="relative bg-gradient-to-b from-orange-500/70 via-amber-400/60 to-yellow-300/0 py-10 md:py-20">
                <div className="max-w-6xl mx-auto px-4 md:px-6 flex items-center gap-10 md:gap-20 max-md:flex-col">
                    <img
                        src={Department}
                        alt="cba"
                        className="size-52 md:size-62"
                    />
                    <div className="space-y-4">
                        <h1 className="text-3xl font-extrabold text-white max-md:text-center">
                            College of Business Administration
                        </h1>
                        <p className="font-medium max-md:text-justify">
                            The College of Business Administration develops
                            future leaders who uphold innovation, integrity, and
                            excellence. Through a balanced mix of theory and
                            practical learning in management, marketing,
                            entrepreneurship, and finance, students gain the
                            skills to thrive in a competitive global market.
                            With expert faculty and industry exposure, the
                            college equips graduates to lead with competence,
                            creativity, and ethical responsibility in driving
                            business success and economic growth.
                        </p>
                    </div>
                </div>
            </div>
            <div className="max-w-6xl mx-auto p-4 md:p-6"></div>
        </>
    );
}

CBA.layout = (page: ReactPortal) => <WebLayout children={page} />;
