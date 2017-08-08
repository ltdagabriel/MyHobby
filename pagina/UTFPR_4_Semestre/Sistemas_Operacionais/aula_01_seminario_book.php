<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

    <body class="text-justify">
        <h3>Arquitetura de um Sistema Computacional <small>(conj. de instruções, um núcleo, múltiplos núcleos)</small></h3>
  <table class="table table-striped">
      <thead>
        <tr>
            <td>Nome:</td>
            <td>RA</td>
            <td>Tema</td>
        </tr>
      </thead>
      <tbody>
        <tr>
            <td>Caio Cesar Hideo Nakai</td>
            <td>1816403</td>
            <td><a href="#cap-1">1.3.1 Single-Processor Systems</a></td>
        </tr>
        <tr>
            <td>Gabriel Choptian</td>
            <td>1816420</td>
            <td><a href="#cap-2">1.3.2 Multiprocessor Systems</a></td>
        </tr>
        <tr>
            <td>Vinicius Bosa Petris</td>
            <td>1563785</td>
            <td><a href="#cap-3">1.3.3 Clustered Systems</a></td>
        </tr>
      </tbody>
  </table>   
  <p> 
      <h3>Computer-System Architecture</h3>
      <p>
  In Section 1.2 we introduced the general structure of a typical computer system. 
  A computer system may be organized in a number of different ways, which we can
  categorize roughly according to the number of general-purpose processors used. </p>
  <h3 id="cap-1">1.3.1 Single-Processor Systems </h3>
  <p>
  Most systems vise a single processor. The variety of single-processor systems may be surprising,
  however, since these systems range from PDAs through mainframes. On a single-processor system,
  there is one main CPU capable of executing a general-purpose instruction set, including instructions
  from user processes. Almost all systems have other special-purpose processors as well. They may come
  in the form of device-specific processors, such as disk, keyboard, and graphics controllers; or, on
  mainframes, they may come in the form of more general-purpose processors, such as I/O processors that
  move data rapidly among the components of the system. 
  </p>
  <p>All of these special-purpose processors run a limited instruction set and do not run user processes.
      Sometimes they are managed by the operating system, in that the operating system sends them information 
      about their next task and monitors their status. For example, a disk-controller microprocessor 
  receives a sequence of requests from the main CPU and implements its own disk queue and scheduling algorithm. 
  This arrangement relieves the main CPU of the overhead of disk scheduling. PCs contain a microprocessor in the
  keyboard to convert the keystrokes into codes to be sent to the CPU. In other systems 
  or circumstances, special-purpose processors are low-level components built into the hardware. The operating
  system cannot communicate with these processors; they do their jobs autonomously. The use of special-purpose
  microprocessors is common and does not turn a single-processor system into 
  a multiprocessor. If there is only one general-purpose CPU, then the system is a single-processor system.</p>
  <h3 id="cap-2">1.3.2 Multiprocessor Systems</h3><p> 
  Although single-processor systems are most common, multiprocessor systems 
  (also known as parallel systems or tightly coupled systems) are growing 
  in importance. Such systems have two or more processors in close communication, 
  sharing the computer bus and sometimes the clock, memory, and 
  peripheral devices. </p>
  <p>
  Multiprocessor systems have three main advantages: 
  </p>
  <strong>1. Increased throughput.</strong> By increasing the number of processors, we expect 
  to get more work done in less time. The speed-up ratio with N processors 
  is not N, however; rather, it is less than N. When multiple processors 
  cooperate on a task, a certain amount of overhead is incurred in keeping 
  all the parts working correctly. This overhead, plus contention for shared 
  resources, lowers the expected gain from additional processors. Similarly, 
  N programmers working closely together do not produce N times the 
amount of work a single programmer would produce.</p>
<p>
    <strong>2. Economy of scale.</strong> Multiprocessor systems can cost less than equivalent 
  multiple single-processor systems, because they can share peripherals, 
  mass storage, and power supplies. If several programs operate on the 
  same set of data, it is cheaper to store those data on one disk and to have 
  all the processors share them than to have many computers with local 
  disks and many copies of the data. 
</p>
        <p>
            <strong>3. Increased reliability.</strong> If functions can be distributed properly among 
  several processors, then the failure of one processor will not halt the 
  system, only slow it down. If we have ten processors and one fails, then 
  each of the remaining nine processors can pick up a share of the work of 
  the failed processor. Thus, the entire system runs only 10 percent slower, 
  rather than failing altogether. </p>
        <p>
  Increased reliability of a computer system is crucial in many applications. 
  The ability to continue providing service proportional to the level of surviving 
  hardware is called graceful degradation. Some systems go beyond graceful 
  degradation and are called fault tolerant, because they can suffer a failure of 
  any single component and still continue operation. Note that fault tolerance 
  requires a mechanism to allow the failure to be detected, diagnosed, and, if 
  possible, corrected. The HP NonStop system (formerly Tandem) system uses 
  both hardware and software duplication to ensure continued operation despite 
  faults. The system consists of multiple pairs of CPUs, working in lockstep. Both 
  processors in the pair execute each instruction and compare the results. If the 
  results differ, then one CPU of the pair is at fault, and both are halted. The 
  process that was being executed is then moved to another pair of CPUs, and the 
  instruction that failed is restarted. This solution is expensive, since it involves 
  special hardware and considerable hardware duplication. </p>
  <p>The multiple-processor systems in use today are of two types. Some 
  systems use asymmetric multiprocessing, in which each processor is assigned 
  a specific task. A master processor controls the system; the other processors 
  either look to the master for instruction or have predefined tasks. This scheme 
  defines a master-slave relationship. The master processor schedules and 
  allocates work to the slave processors. </p>
        <p>
  The most common systems use symmetric multiprocessing (SMP), in 
  which each processor performs all tasks within the operating system. SMP 
  means that all processors are peers; no master-slave relationship exists 
  between processors. Figure 1.6 illustrates a typical SMP architecture. An 
  example of the SMP system is Solaris, a commercial version of UNIX designed 
  by Sun Microsystems. A Solaris system can be configured to employ dozens of 
  processors, all running Solaris. The benefit of this model is that many processes</p>
        <p class="text-center"><img  src="/Myhobby/Imagens/Screenshot_1.png" alt=""/></p>
<p>can run simultaneously—N processes can run if there are N CPUs—without 
  causing a significant deterioration of performance. However, we must carefully 
  control I/O to ensure that the data reach the appropriate processor. Also, since 
  the CPUs are separate, one may be sitting idle while another is overloaded, 
  resulting in inefficiencies. These inefficiencies can be avoided if the processors 
  share certain data structures. A multiprocessor system of this form will allow 
  processes and resources—such as memory—to be shared dynamically among 
  the various processors and can lower the variance among the processors. Such 
  a system must be written carefully, as we shall see in Chapter 6. Virtually all 
  modern operating systems—including Windows, Windows XP, Mac OS X, and 
  Linux—now provide support for SMP. 
  The difference between symmetric and asymmetric multiprocessing may 
  result from either hardware or software. Special hardware can differentiate the 
  multiple processors, or the software can be written to allow only one master and 
  multiple slaves. For instance, Sun's operating system SunOS Version 4 provided 
  asymmetric multiprocessing, whereas Version 5 (Solaris) is symmetric on the 
  same hardware. 
  A recent trend in CPU design is to include multiple compute cores on 
  a single chip. In essence, these are multiprocessor chips. Two-way chips are 
  becoming mainstream, while N-way chips are going to be common in high-end 
  systems. Aside from architectural considerations such as cache, memory, and 
  bus contention, these multi-core CPUs look to the operating system just as N 
  standard processors. 
  Lastly, blade servers are a recent development in which multiple processor 
  boards, I/O boards, and networking boards are placed in the same chassis. 
  The difference between these and traditional multiprocessor systems is that 
  each blade-processor board boots independently and runs its own operating 
  system. Some blade-server boards are multiprocessor as well, which blurs the 
  lines between types of computers. In essence, those servers consist of multiple 
  independent multiprocessor systems.</p> 
  <h3 id="cap-3">1.3.3 Clustered Systems</h3>
  <p> 
  Another type of multiple-CPU system is the clustered system. Like multiprocessor 
  systems, clustered systems gather together multiple CPUs to accomplish 
  computational work. Clustered systems differ from multiprocessor systems, 
  however, in that they are composed of two or more individual systems 
  coupled together. The definition of the term clustered is not concrete; many 
  commercial packages wrestle with what a clustered system is and why one 
  form is better than another. The generally accepted definition is that clustered 
  computers share storage and are closely linked via a local-area network (LAN) 
  (as described in Section 1.10) or a faster interconnect such as InfiniBand. 
  Clustering is usually used to provide high-availability service; that is, 
  service will continue even if one or more systems in the cluster fail. High 
  availability is generally obtained by adding a level of redundancy in the 
  system. A layer of cluster software runs on the cluster nodes. Each node can 
  monitor one or more of the others (over the LAN). If the monitored machine 
  fails, the monitoring machine can take ownership of its storage and restart the 
  applications that were running on the failed machine. The users and clients of 
  the applications see only a brief interruption of service.</p>
<p>Clustering can be structured asymmetrically or symmetrically. In asymmetric 
  clustering, one machine is in hot-standby mode while the other is 
  running the applications. The hot-standby host machine does nothing but 
  monitor the active server. If that server fails, the hot-standby host becomes the 
  active server. In symmetric mode, two or more hosts are running applications, 
  and are monitoring each other. This mode is obviously more efficient, as it uses 
  all of the available hardware. It does require that more than one application be 
  available to run. 
  Other forms of clusters include parallel clusters and clustering over a 
  wide-area network (WAN) (as described in Section 1.10). Parallel clusters allow 
  multiple hosts to access the same data on the shared storage. Because most 
  operating systems lack support for simultaneous data access by multiple hosts, 
  parallel clusters are usually accomplished by use of special versions of software 
  and special releases of applications. For example, Oracle Parallel Server is a 
  version of Oracle's database that has been designed to run on a parallel cluster. 
  Each machine runs Oracle, and a layer of software tracks access to the shared 
  disk. Each machine has full access to all data in the database. To provide this 
  shared access to data, the system must also supply access control and locking 
  to ensure that no conflicting operations occur. This function, commonly known 
  as a distributed lock manager (DLM), is included in some cluster technology. 
  Cluster technology is changing rapidly. Some cluster products support 
  dozens of systems in a cluster, as well as clustered nodes that are separated 
  by miles. Many of these improvements are made possible by storage-area 
  networks (SANs), as described in Section 12.3.3, which allow many systems 
  to attach to a pool of storage. If the applications and their data are stored on 
  the SAN, then the cluster software can assign the application to run on any 
  host that is attached to the SAN. If the host fails, then any other host can take 
  over. In a database cluster, dozens of hosts can share the same database, greatlyincreasing 
  performance and reliability. 
</p>
</body>
</html>
