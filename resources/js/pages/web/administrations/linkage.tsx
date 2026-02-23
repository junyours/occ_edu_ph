import WebLayout from "@/layouts/web-layout";
import { ReactPortal, useState } from "react";
import Bg1 from "../../../../../public/images/backgrounds/1.jpg";
import OCC from "../../../../../public/images/occ.png";
import { cn } from "@/lib/utils";
import Coor1 from "../../../../../public/images/administrators/linkages/coordinators/1.png";
import Coor2 from "../../../../../public/images/administrators/linkages/coordinators/2.png";
import Coor3 from "../../../../../public/images/administrators/linkages/coordinators/3.png";
import Coor4 from "../../../../../public/images/administrators/linkages/coordinators/4.png";

type Coordinator = {
    name: string;
    position: string;
    image: string;
};

const items: Coordinator[] = [
    {
        name: "DR. ALMA T. GURREA",
        position: "Vice President for International Affairs and Linkages",
        image: Coor1,
    },
    {
        name: "MARIA JESSA K. LINOGAO",
        position:
            "Coordinator, International Affairs and Linkages College of Information Technology",
        image: Coor2,
    },
    {
        name: "EVELYN T. EXCLAMADOR",
        position:
            "Coordinator, International Affairs and Linkages College of Business Administrator ",
        image: Coor3,
    },
    {
        name: "TRISHA C. CORELLIA",
        position:
            "Coordinator, International Affairs and Linkages College of Teacher Education",
        image: Coor4,
    },
];

export default function Linkage() {
    const [tabs, setTabs] = useState("about");

    return (
        <>
            <div className="relative h-56 md:h-96 flex">
                <div className="absolute inset-0 max-w-6xl mx-auto flex px-4 md:px-6">
                    <div className="flex-1 flex items-center">
                        <h1 className="text-xl md:text-4xl font-extrabold uppercase text-slate-800">
                            International Affairs & Linkages
                        </h1>
                    </div>
                    <div className="flex-1"></div>
                </div>
                <div className="flex-1"></div>
                <div className="relative flex-1 overflow-hidden [clip-path:polygon(20%_0%,100%_0%,100%_100%,0%_100%)]">
                    <img src={Bg1} className="size-full object-cover" />
                    <div className="absolute inset-0 bg-white/70"></div>
                    <img
                        src={OCC}
                        className="absolute inset-0 m-auto size-80 object-contain"
                    />
                </div>
            </div>
            <div className="max-w-6xl mx-auto p-4 md:p-6 space-y-8">
                <div className="flex">
                    <div className="min-w-64 h-fit flex flex-col">
                        <button
                            onClick={() => setTabs("about")}
                            className={cn(
                                "h-10 border-l-2 px-4 text-start font-semibold text-slate-800 uppercase text-sm transition-all",
                                tabs === "about"
                                    ? "border-blue-800"
                                    : "border-transparent bg-gray-200",
                            )}
                        >
                            About
                        </button>
                        <button
                            onClick={() => setTabs("coordinators")}
                            className={cn(
                                "h-10 border-l-2 px-4 text-start font-semibold text-slate-800 uppercase text-sm transition-all",
                                tabs === "coordinators"
                                    ? "border-blue-800"
                                    : "border-transparent bg-gray-200",
                            )}
                        >
                            Coordinators
                        </button>
                        <button
                            onClick={() => setTabs("news")}
                            className={cn(
                                "h-10 border-l-2 px-4 text-start font-semibold text-slate-800 uppercase text-sm transition-all",
                                tabs === "news"
                                    ? "border-blue-800"
                                    : "border-transparent bg-gray-200",
                            )}
                        >
                            News
                        </button>
                        <button
                            onClick={() => setTabs("contact")}
                            className={cn(
                                "h-10 border-l-2 px-4 text-start font-semibold text-slate-800 uppercase text-sm transition-all",
                                tabs === "contact"
                                    ? "border-blue-800"
                                    : "border-transparent bg-gray-200",
                            )}
                        >
                            Contact Details
                        </button>
                    </div>
                    {tabs === "about" && (
                        <div className="h-fit flex-1 p-6 border space-y-8">
                            <h1 className="text-slate-800 text-lg font-semibold border-b border-slate-800 pb-2">
                                Office Description
                            </h1>
                            <div>
                                <p>
                                    The Office for International Affairs and
                                    Linkages is a key support system for global
                                    engagement. It helps raise the institution’s
                                    visibility and build academic partnerships.
                                    The office promotes internationalization
                                    through its efforts in the curriculum,
                                    mobility programs, and institutional
                                    linkages that meet national and global
                                    standards.
                                </p>
                            </div>
                            <div className="flex-1 p-6 border space-y-8">
                                <h1 className="text-slate-800 text-lg font-semibold border-b border-slate-800 pb-2 text-center">
                                    Institutional Framework
                                </h1>
                                <div className="space-y-4">
                                    <div className="space-y-2">
                                        <h1 className="text-slate-800 font-semibold">
                                            Vision–Mission Alignment
                                        </h1>
                                        <p>
                                            Opol Community College (OCC) is
                                            committed to producing globally
                                            competent graduates while remaining
                                            responsive to the needs of the local
                                            community. Internationalization is
                                            integrated across the core functions
                                            of the institution, including
                                            instruction, research, extension and
                                            community engagement, and
                                            institutional development, to ensure
                                            balanced local relevance and global
                                            competitiveness.
                                        </p>
                                    </div>
                                    <div className="space-y-2">
                                        <h1 className="text-slate-800 font-semibold">
                                            Goals of Internationalization
                                        </h1>
                                        <div>
                                            <p className="mb-1">
                                                The internationalization
                                                initiatives of OCC aim to:
                                            </p>
                                            <p>
                                                <span className="font-semibold">
                                                    • Instruction
                                                </span>{" "}
                                                – Integrate ASEAN and global
                                                perspectives into the
                                                curriculum.
                                            </p>
                                            <p>
                                                <span className="font-semibold">
                                                    • Research
                                                </span>{" "}
                                                – Foster collaborative research
                                                with ASEAN and global partners.
                                            </p>
                                            <span className="font-semibold">
                                                • Mobility
                                            </span>{" "}
                                            – Promote student and faculty
                                            exchange programs.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    )}
                    {tabs === "coordinators" && (
                        <div className="h-fit flex-1 p-6 border space-y-8">
                            <h1 className="text-slate-800 text-lg font-semibold border-b border-slate-800 pb-2">
                                Coordinators
                            </h1>
                            <h1 className="text-center text-slate-800 text-lg font-semibold uppercase">
                                Meet Our Team
                            </h1>
                            <div className="grid grid-cols-3 gap-6">
                                {items.map((item, index) => (
                                    <div
                                        key={index}
                                        className={
                                            index === 0
                                                ? "col-span-3 flex justify-center"
                                                : ""
                                        }
                                    >
                                        <div className="border w-full max-w-xs">
                                            <img
                                                src={item.image}
                                                alt={item.name}
                                                className="object-contain"
                                            />
                                            <div className="p-4 space-y-2">
                                                <h1 className="font-semibold text-center">
                                                    {item.name}
                                                </h1>
                                                <p className="text-sm font-medium text-center">
                                                    {item.position}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                ))}
                            </div>
                        </div>
                    )}
                    {tabs === "news" && (
                        <div className="h-fit flex-1 p-6 border space-y-8">
                            <h1 className="text-slate-800 text-lg font-semibold border-b border-slate-800 pb-2">
                                News
                            </h1>
                        </div>
                    )}
                    {tabs === "contact" && (
                        <div className="h-fit flex-1 p-6 border space-y-8">
                            <h1 className="text-slate-800 text-lg font-semibold border-b border-slate-800 pb-2">
                                Contact Details
                            </h1>
                            <p>
                                Email Address:{" "}
                                <a
                                    href="mailto:alma.gurrea@occ.edu.ph"
                                    target="_blank"
                                    className="hover:underline text-blue-500"
                                >
                                    alma.gurrea@occ.edu.ph
                                </a>
                            </p>
                        </div>
                    )}
                </div>
            </div>
        </>
    );
}

Linkage.layout = (page: ReactPortal) => <WebLayout children={page} />;
