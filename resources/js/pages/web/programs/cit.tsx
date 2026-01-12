import WebLayout from "@/layouts/web-layout";
import { ReactPortal } from "react";
import Faculty1 from "../../../../../public/images/departments/cit/faculty/1.png";
import Faculty2 from "../../../../../public/images/departments/cit/faculty/2.png";
import Faculty3 from "../../../../../public/images/departments/cit/faculty/3.png";
import Faculty4 from "../../../../../public/images/departments/cit/faculty/4.png";
import Faculty5 from "../../../../../public/images/departments/cit/faculty/5.png";
import Faculty6 from "../../../../../public/images/departments/cit/faculty/6.png";
import Faculty7 from "../../../../../public/images/departments/cit/faculty/7.png";
import Faculty8 from "../../../../../public/images/departments/cit/faculty/8.png";
import Faculty9 from "../../../../../public/images/departments/cit/faculty/9.png";
import Faculty10 from "../../../../../public/images/departments/cit/faculty/10.png";
import Faculty11 from "../../../../../public/images/departments/cit/faculty/11.png";
import Faculty12 from "../../../../../public/images/departments/cit/faculty/12.png";
import Faculty13 from "../../../../../public/images/departments/cit/faculty/13.png";
import Department from "../../../../../public/images/departments/CIT.png";
import Flyer1 from "../../../../../public/images/departments/cit/flyers/1.png";
import Bg1 from "../../../../../public/images/backgrounds/1.jpg";

type Faculty = {
    name: string;
    position: string;
    image: string;
};

const items: Faculty[] = [
    {
        name: "Ruben Madriaga, LPT, MIT",
        position: "College Dean/Research Coordinator",
        image: Faculty9,
    },
    {
        name: "Gaudencio Iyo Jr., MIT",
        position: "Faculty/System Administrator",
        image: Faculty6,
    },
    {
        name: "Jeffrey Ubarco, MIT",
        position: "Faculty",
        image: Faculty12,
    },
    {
        name: "Maria Jessa Linogao, MIT",
        position: "Faculty",
        image: Faculty7,
    },
    {
        name: "Novelyn Joy Daculan",
        position: "Faculty",
        image: Faculty3,
    },
    {
        name: "Niel Daculan",
        position: "Faculty",
        image: Faculty2,
    },
    {
        name: "Johnfed Cariaga",
        position: "Faculty/ICT Officer",
        image: Faculty1,
    },
    {
        name: "Jomar Otoc",
        position: "Faculty",
        image: Faculty11,
    },
    {
        name: "Cyron Micarte",
        position: "Faculty",
        image: Faculty10,
    },
    {
        name: "John Rey Macua",
        position: "Faculty",
        image: Faculty8,
    },
    {
        name: "Ryan Jay Villastique",
        position: "Faculty",
        image: Faculty13,
    },
    {
        name: "Barry Gebe",
        position: "Faculty/Computer Programmer",
        image: Faculty5,
    },
    {
        name: "Al Christian Gaid",
        position: "Faculty/Computer Programmer",
        image: Faculty4,
    },
];

export default function CIT() {
    return (
        <>
            <div className="relative bg-gradient-to-b from-red-500/70 via-rose-400/60 to-pink-300/0 py-10 md:py-20">
                <div className="max-w-6xl mx-auto px-4 md:px-6 flex items-center gap-10 md:gap-20 max-md:flex-col">
                    <img
                        src={Department}
                        alt="cit"
                        className="size-52 md:size-62"
                    />
                    <div className="space-y-4">
                        <h1 className="text-3xl font-extrabold text-white max-md:text-center">
                            College of Information Technology
                        </h1>
                        <p className="font-medium max-md:text-justify">
                            The College of Information Technology prepares
                            students to become skilled and innovative
                            professionals ready to excel in today’s digital
                            world. With hands-on learning in programming,
                            networking, web development, cybersecurity, and
                            emerging technologies, students develop critical
                            thinking and problem-solving skills. Guided by
                            expert faculty and equipped with modern facilities,
                            the college fosters innovation, ethical
                            responsibility, and leadership—producing graduates
                            who are globally competitive and committed to
                            advancing technology and society.
                        </p>
                    </div>
                </div>
            </div>
            <div className="max-w-6xl mx-auto flex max-md:flex-col-reverse gap-8 px-4 md:p-6">
                <div className="flex-1 space-y-6">
                    <div className="flex items-center gap-4">
                        <h1 className="font-bold text-2xl text-nowrap">
                            College Leadership
                        </h1>
                        <div className="h-px w-full bg-blue-700"></div>
                    </div>
                    <div className="space-y-4">
                        {items.map((item, index) => (
                            <div
                                key={index}
                                className="flex items-center gap-4"
                            >
                                <div className="relative size-28 rounded-full border border-slate-100 shrink-0">
                                    <img
                                        src={Bg1}
                                        className="size-full object-cover rounded-full"
                                    />
                                    <div className="absolute inset-0 bg-blue-700/25 rounded-full"></div>
                                    <img
                                        src={item.image}
                                        className="absolute inset-0 rounded-full"
                                    />
                                </div>
                                <div>
                                    <h1 className="font-bold">{item.name}</h1>
                                    <p className="text-gray-600 text-sm font-medium">
                                        {item.position}
                                    </p>
                                </div>
                            </div>
                        ))}
                    </div>
                </div>
                <div className="flex-1">
                    <img src={Flyer1} className="object-contain" />
                </div>
            </div>
        </>
    );
}

CIT.layout = (page: ReactPortal) => <WebLayout children={page} />;
