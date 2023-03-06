import { AnimatePresence, motion } from "framer-motion";
import { Footer } from "./footer/Footer";
import { Header } from "./header/Header";

type Props = {
  children: React.ReactNode;
};

export function Layout({ children }: Props) {
  return (
    <AnimatePresence>
      <motion.div
        className="wrapper"
        initial={{ opacity: 0, y: 20 }}
        animate={{ opacity: 1, y: 0 }}
        exit={{ opacity: 0, y: 20 }}
        transition={{ delay: 0.2, duration: 0.4 }}
      >
        <Header />
        <main style={{ flex: "1 1 auto" }}>{children}</main>
        <Footer />
      </motion.div>
    </AnimatePresence>
  );
}
