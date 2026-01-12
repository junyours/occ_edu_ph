import WebLayout from "@/layouts/web-layout";
import { ReactPortal } from "react";
import Department from "../../../../../public/images/departments/TED.png";

export default function TED() {
    return (
        <>
            <div className="relative bg-gradient-to-b from-purple-500/70 via-violet-400/60 to-fuchsia-300/0 py-10 md:py-20">
                <div className="max-w-6xl mx-auto px-4 md:px-6 flex items-center gap-10 md:gap-20 max-md:flex-col">
                    <img
                        src={Department}
                        alt="ted"
                        className="size-52 md:size-62"
                    />
                    <div className="space-y-4">
                        <h1 className="text-3xl font-extrabold text-white max-md:text-center">
                            Teacher Education Department
                        </h1>
                        <p className="font-medium max-md:text-justify">
                            The Teacher Education Department prepares future
                            educators who are passionate, competent, and
                            dedicated to excellence in teaching. Through strong
                            academic training, practical experience, and
                            mentorship, students develop the knowledge and
                            skills to become effective, inclusive, and inspiring
                            teachers who contribute to the nation’s educational
                            growth and lifelong learning.
                        </p>
                    </div>
                </div>
            </div>
            <div className="max-w-6xl mx-auto p-4 md:p-6"></div>
        </>
    );
}

TED.layout = (page: ReactPortal) => <WebLayout children={page} />;
