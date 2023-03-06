import styles from "./form.module.css";
import formImg from "../../public/media/form_img.png";
import Image from "next/image";
import { MotionSection } from "../MotionSection";
import { useInView } from "react-intersection-observer";

export function Form() {
  const { ref: section, inView: sectionIsVisible } = useInView({
    triggerOnce: true,
  });

  return (
    <MotionSection motionRef={section} motionBoolean={sectionIsVisible}>
      <div className={`box ${styles.form_inner}`}>
        <div className={styles.form_content}>
          <p className="section_title">Book an Appointement</p>
          <form className={styles.form}>
            <div className={styles.form_inner}>
              <input type="text" placeholder="Full Name" />
              <input type="text" placeholder="Email " />
              <input type="text" placeholder="Phone number" />
              <input type="text" placeholder="Select Your Services" />
              <textarea
                cols={30}
                rows={5}
                placeholder="Your Message Here"
              ></textarea>
            </div>
            <button type="submit">Send Message</button>
          </form>
        </div>
        <Image src={formImg} alt={"form image"} className={styles.form_img} />
      </div>
    </MotionSection>
  );
}
