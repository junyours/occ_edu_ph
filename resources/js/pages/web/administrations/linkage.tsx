import WebLayout from "@/layouts/web-layout";
import { ReactPortal, useState } from "react";
import Bg1 from "../../../../../public/images/backgrounds/1.jpg";
import OCC from "../../../../../public/images/occ.png";
import { cn } from "@/lib/utils";
import Coor1 from "../../../../../public/images/administrators/linkages/coordinators/1.png";
import Coor2 from "../../../../../public/images/administrators/linkages/coordinators/2.png";
import Coor3 from "../../../../../public/images/administrators/linkages/coordinators/3.png";
import Coor4 from "../../../../../public/images/administrators/linkages/coordinators/4.png";
import { Link, usePage } from "@inertiajs/react";
import { PageProps } from "@/types";
import { motion, Variants } from "framer-motion";
import { MoveRight } from "lucide-react";

type Coordinator = {
    name: string;
    position: string;
    image: string;
};

interface Sdg {
    id: number;
    image: string;
}

interface News {
    id: number;
    hash_id: string;
    title: string;
    description: string;
    date: Date;
    image: string;
    sdg: Sdg[];
}

interface Props extends PageProps {
    news: News[];
    search: string | undefined;
}

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
        name: "TRISHA AMOR C. CORILLA",
        position:
            "Coordinator, International Affairs and Linkages College of Teacher Education",
        image: Coor4,
    },
];

export default function Linkage() {
    const { news } = usePage<Props>().props;
    const [tabs, setTabs] = useState("about");

    const cardVariants: Variants = {
        hidden: {
            opacity: 0,
            y: 40,
        },
        visible: (index: number) => ({
            opacity: 1,
            y: 0,
            transition: {
                duration: 0.6,
                ease: "easeOut",
                delay: index * 0.15,
            },
        }),
    };

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
                <div className="flex max-md:flex-col">
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
                            onClick={() => setTabs("officers")}
                            className={cn(
                                "h-10 border-l-2 px-4 text-start font-semibold text-slate-800 uppercase text-sm transition-all",
                                tabs === "officers"
                                    ? "border-blue-800"
                                    : "border-transparent bg-gray-200",
                            )}
                        >
                            Officers
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
                    {tabs === "officers" && (
                        <div className="h-fit flex-1 p-6 border space-y-8">
                            <h1 className="text-slate-800 text-lg font-semibold border-b border-slate-800 pb-2">
                                Officers
                            </h1>
                            <h1 className="text-center text-slate-800 text-lg font-semibold uppercase">
                                Meet Our Team
                            </h1>
                            <div className="grid md:grid-cols-3 gap-6">
                                {items.map((item, index) => (
                                    <div
                                        key={index}
                                        className={
                                            index === 0
                                                ? "md:col-span-3 md:flex md:justify-center"
                                                : ""
                                        }
                                    >
                                        <div className="border w-full md:max-w-xs">
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
                            <div className="grid md:grid-cols-2 gap-4 md:gap-6">
                                {news.map((item, index) => (
                                    <motion.div
                                        key={item.id}
                                        custom={index}
                                        variants={cardVariants}
                                        initial="hidden"
                                        whileInView="visible"
                                        viewport={{ once: true, amount: 0.2 }}
                                        className="flex flex-col shadow-2xl border border-slate-100 will-change-transform"
                                    >
                                        <div className="group h-44 md:h-56 overflow-hidden relative">
                                            <img
                                                src={`https://lh3.googleusercontent.com/d/${item.image}`}
                                                className="size-full object-cover transform transition duration-700 ease-in-out group-hover:scale-125 group-hover:-rotate-2"
                                            />
                                            <div className="absolute top-4 left-4 bg-blue-700 flex flex-col items-center shadow-2xl border border-slate-100">
                                                <h1 className="font-semibold text-2xl text-white p-2">
                                                    {new Date(
                                                        item.date,
                                                    ).getDate()}
                                                </h1>
                                                <p className="font-medium text-xs bg-white p-1">
                                                    {new Date(
                                                        item.date,
                                                    ).toLocaleString("en-US", {
                                                        month: "short",
                                                    })}
                                                    ,{" "}
                                                    {new Date(
                                                        item.date,
                                                    ).getFullYear()}
                                                </p>
                                            </div>
                                        </div>
                                        <div className="flex-1 p-6 flex flex-col gap-6">
                                            <div className="flex-1 space-y-4">
                                                <div className="flex items-center gap-1.5 flex-wrap">
                                                    <div className="grid grid-cols-8 gap-2">
                                                        {item.sdg.map((sdg) => (
                                                            <img
                                                                key={sdg.id}
                                                                src={`https://lh3.googleusercontent.com/d/${sdg.image}`}
                                                                className="object-contain"
                                                            />
                                                        ))}
                                                    </div>
                                                </div>
                                                <h1 className="text-xl font-semibold line-clamp-1 md:line-clamp-2">
                                                    {item.title}
                                                </h1>
                                                <p className="text-gray-600 line-clamp-2 md:line-clamp-3 text-sm">
                                                    {item.description}
                                                </p>
                                            </div>
                                            <Link
                                                href={`/news/article/${item.hash_id}`}
                                                className="w-fit"
                                            >
                                                <button
                                                    type="button"
                                                    className="relative group inline-flex justify-center items-center gap-2 whitespace-nowrap border border-slate-800 px-5 py-3.5 tracking-wide transition-colors text-center cursor-pointer"
                                                >
                                                    <span className="relative z-10 transition-colors duration-300 group-hover:text-white">
                                                        Read More
                                                    </span>
                                                    <MoveRight
                                                        className="relative z-10 transition-colors duration-300 group-hover:text-white"
                                                        strokeWidth={1.5}
                                                    />
                                                    <span className="absolute left-0 top-0 h-full w-0 bg-slate-800 transition-all duration-500 ease-out group-hover:w-full"></span>
                                                </button>
                                            </Link>
                                        </div>
                                    </motion.div>
                                ))}
                            </div>
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
                                    className="hover:underline text-blue-700"
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
