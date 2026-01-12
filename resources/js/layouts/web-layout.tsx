import Footer from "@/components/web/footer";
import Navbar from "@/components/web/navbar";
import { PropsWithChildren } from "react";

export default function WebLayout({ children }: PropsWithChildren) {
    return (
        <>
            <Navbar />
            {children}
            <div className="mt-10 md:mt-20">
                <Footer />
            </div>
        </>
    );
}
