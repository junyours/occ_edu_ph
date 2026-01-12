import { Link } from "@inertiajs/react";
import { Facebook } from "lucide-react";
import Logo from "../../../../public/images/logo.png";

export default function Footer() {
    return (
        <footer className="border-t border-gray-200">
            <div className="mx-auto w-full max-w-6xl p-4 md:p-6">
                <div className="md:flex md:justify-between">
                    <div className="mb-6 md:mb-0">
                        <Link href={route("home")}>
                            <img
                                src={Logo}
                                alt="occ-logo"
                                className="h-12 object-contain"
                            />
                        </Link>
                    </div>
                    <div className="grid grid-cols-2 gap-8 sm:gap-6 sm:grid-cols-3">
                        <div>
                            <h2 className="mb-6 text-sm font-semibold uppercase">
                                Follow us
                            </h2>
                            <ul className="text-gray-500 font-medium">
                                <li className="mb-4">
                                    <a
                                        href="https://www.facebook.com/OCCofficialPage"
                                        target="_blank"
                                        className="hover:underline"
                                    >
                                        Facebook
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div>
                            <h2 className="mb-6 text-sm font-semibold uppercase">
                                Legal
                            </h2>
                            <ul className="text-gray-500 font-medium">
                                <li className="mb-4">
                                    <a href="#" className="hover:underline">
                                        Privacy Policy
                                    </a>
                                </li>
                                <li>
                                    <a href="#" className="hover:underline">
                                        Terms &amp; Conditions
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <hr className="my-6 border-gray-200 sm:mx-auto lg:my-8" />
                <div className="sm:flex sm:items-center sm:justify-between">
                    <span className="text-sm text-gray-500 sm:text-center">
                        © {new Date().getFullYear()}{" "}
                        <Link href={route("home")} className="hover:underline">
                            {import.meta.env.VITE_APP_NAME}
                        </Link>
                        . All Rights Reserved.
                    </span>
                    <div className="flex mt-4 sm:justify-center sm:mt-0">
                        <a
                            href="https://www.facebook.com/OCCofficialPage"
                            target="_blank"
                            className="text-gray-500 hover:text-gray-800"
                        >
                            <Facebook className="size-5" strokeWidth={1.5} />
                        </a>
                    </div>
                </div>
            </div>
        </footer>
    );
}
